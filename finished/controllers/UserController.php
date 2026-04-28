<?php

declare(strict_types=1);

namespace controllers;

use DateTime;
use enums\UserRole;
use InvalidArgumentException;
use models\User;
use services\AuthService;
use Throwable;

/**
 * Class UserController
 *
 * Handles API requests for authentication (Login/Logout) and session management.
 * Returns JSON responses instead of HTML redirects.
 *
 * @package controllers
 * @version 1.1 (API Version)
 * @since 28-04-2026
 * @author Abdelhalim Yasser
 */
class UserController
{
    public function __construct(
        private readonly AuthService $authService
    ) {}

    /**
     * Ensures a session is active before interacting with $_SESSION.
     */
    private function ensureSessionStarted(): void
    {
        if (session_status() === PHP_SESSION_NONE) {
            session_start();
        }
    }

    /**
     * @param array $data
     * @param int $statusCode
     * @return void
     */
    private function sendJson(array $data, int $statusCode = 200)
    {
        http_response_code($statusCode);
        header('Content-Type: application/json');
        echo json_encode($data);
        exit;
    }

    /**
     * Handles public candidate registration, formatting inputs, and creating the User object.
     *
     * @return void
     */
    public function createAccount(): void
    {
        if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
            $this->sendJson(['error' => 'Bad Request'], 405);
        }

        $this->ensureSessionStarted();

        try {
            $firstName      = filter_input(INPUT_POST, 'first_name', FILTER_SANITIZE_SPECIAL_CHARS) ?: '';
            $lastName       = filter_input(INPUT_POST, 'last_name', FILTER_SANITIZE_SPECIAL_CHARS) ?: '';
            $email          = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_EMAIL) ?: '';
            $password       = $_POST['password'] ?? '';
            $countryCode    = $_POST['country_code'] ?? '+20';
            $phoneNumber    = filter_input(INPUT_POST, 'phone_number', FILTER_SANITIZE_NUMBER_INT) ?: '';
            $experienceYear = $_POST['experience_year'] ?? '0';

            $birthDateStr = $_POST['birth_date'] ?? '';
            if (empty($birthDateStr)) {
                throw new InvalidArgumentException("");
            }
            $birthDate = new DateTime($birthDateStr);

            $userSkills = $_POST['skills'] ?? [];
            if (!is_array($userSkills)) {
                $userSkills = [];
            }

            $resumePath = 'uploads/resumes/pending_cv.pdf';
            $docsPath   = 'uploads/docs/pending_docs.pdf';

            if (!empty($firstName) | !empty($lastName) | !empty($email) | !empty($password) | !empty($phoneNumber)) {
                throw new InvalidArgumentException("All fields are required.");
            }

            $newUser = new User(
                $firstName,
                $lastName,
                $birthDate,
                $email,
                $countryCode,
                $phoneNumber,
                UserRole::CANDIDATE,
                $password,
                $userSkills,
                $experienceYear,
                $resumePath,
                $docsPath
            );

            $this->authService->registerCandidate($newUser);

            $_SESSION['success_message'] = '';
            header("Location: /public/login.php");
            exit;

        } catch (InvalidArgumentException $e) {
            $_SESSION['error_message'] = $e->getMessage();
            header("Location: /public/register.php");
            exit;
        } catch (Throwable $e) {
            $_SESSION['error_message'] = "";
            header("Location: /public/register.php");
            exit;
        }
    }

    /**
     * Handles the login API request.
     *
     * @return void
     */
    public function login(): void
    {
        if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
            $this->sendJson(['error' => 'Bad Request'], 405);
        }

        $this->ensureSessionStarted();

        $input = json_decode(file_get_contents('php://input'), true);

        $email = filter_var($input['email'] ?? '', FILTER_SANITIZE_EMAIL) ?: '';
        $password = $input['password'] ?? '';

        if (empty($email) || empty($password)) {
            $this->sendJson(['error' => 'Email and Password are required.'], 400);
        }

        try {
            $userData = $this->authService->login($email, $password);

            session_regenerate_id(true);

            $_SESSION['user_id'] = $userData['id'];
            $_SESSION['user_role'] = $userData['role'];

            $redirectUrl = ($userData['role'] === 'CANDIDATE') ? '/public/dashboard.html' : '/private/dashboard.html';

            $this->sendJson([
                'message' => 'Login successful',
                'user' => [
                    'id' => $userData['id'],
                    'role' => $userData['role']
                ],
                'redirect_url' => $redirectUrl
            ], 200);

        } catch (InvalidArgumentException $e) {
            $this->sendJson(['error' => $e->getMessage()], 401);
        }
    }


    /**
     * Handles logging out via API.
     *
     * @return void
     */
    public function logout(): void
    {
        if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
            $this->sendJson(['error' => 'Method Not Allowed'], 405);
        }

        $this->ensureSessionStarted();

        $_SESSION = [];

        if (ini_get("session.use_cookies")) {
            $params = session_get_cookie_params();
            setcookie(
                session_name(),
                '',
                time() - 42000,
                $params["path"],
                $params["domain"],
                $params["secure"],
                $params["httponly"]
            );
        }

        session_destroy();
        setcookie('remember_token', '', time() - 3600, '/');

        $this->sendJson(['message' => 'Logged out successfully'], 200);
    }
}