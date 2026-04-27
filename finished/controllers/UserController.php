<?php

declare(strict_types=1);

namespace controllers;

use InvalidArgumentException;
use services\AuthService;

/**
 * Class UserController
 *
 * This is 
 *
 * @package controllers
 * @api
 * @version 1.0
 * @since 28-04-2026
 * @auther Abdelhalim Yasser
 */
class UserController
{
    /**
     * @param AuthService $authService
     */
    public function __construct(
        private readonly AuthService $authService
    ) {}

    /**
     * @return void
     */
    private function ensureSessionStarted(): void
    {
        if (session_status() === PHP_SESSION_NONE) {
            session_start();
        }
    }

    /**
     * This function for loging in, saintising inputs and generating diffrent id's to ensure security
     *
     * @return void
     */
    public function login(): void
    {
        if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
            return;
        }

        $this->ensureSessionStarted();

        $email = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_EMAIL) ?: '';
        $password = $_POST['password'] ?? '';

        if (empty($email) || empty($password)) {
            $_SESSION['error_message'] = 'Email and Password are Required.';
            header("Location: /public/login.php");
            exit;
        }

        try {
            $userData = $this->authService->login($email, $password);

            session_regenerate_id(true);

            $_SESSION['user_id'] = $userData['id'];
            $_SESSION['user_role'] = $userData['role'];

            $redirectUrl = ($userData['role'] === 'CANDIDATE') ? '/public/dashboard.php' : '/private/dashboard.php';

            header("Location: " . $redirectUrl);
            exit;

        } catch (InvalidArgumentException $e) {
            $_SESSION['error_message'] = $e->getMessage();
            header("Location: /public/index.php");
            exit;
        }
    }

    /**
     * This function for loging out by destroying the cookie session
     *
     * @return void
     */
    public function logout(): void
    {
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

        header("Location: /login.php");
        exit;
    }
}