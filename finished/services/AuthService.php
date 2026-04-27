<?php

namespace services;

use models\User;
use enums\UserRole;
use repositories\UserRepository;

use Exception;
use RuntimeException;
use Throwable;
use InvalidArgumentException;

/**
 * Class AuthService
 *
 * Represents the authentication service responsible for handling user authentication and authorization processes.
 * This service include methods for user login, registration, password cookies and seesions management.
 * It serves as a central point for managing user authentication and ensuring secure access to protected resources.
 *
 * @package services
 * @version 1.0
 * @since 27-04-2026
 * @author Abdelhalim Yasser
 */
class AuthService
{
    private UserRepository $userRepo;
    private EmailService $emailService;

    /**
     * This constructor initializes the AuthService with the necessary dependencies,
     * including the UserRepository for database interactions and the EmailService for sending emails.
     * It ensures that the service has access to the required components to perform authentication-related operations effectively.
     *
     * @param UserRepository $userRepo
     * @param EmailService $emailService
     */
    public function __construct(UserRepository $userRepo, EmailService $emailService)
    {
        try {
            $this->userRepo = $userRepo;
            $this->emailService = $emailService;
        } catch (Exception $e) {
            throw new RuntimeException();
        }
    }

    /**
     * @param User $user
     * @return bool
     * @throws RuntimeException
     */
    public function registerCandidate(User $user): bool
    {
        $user->setRole(UserRole::CANDIDATE);

        try {
            $hashedPassword = password_hash($user->getPassword(), PASSWORD_DEFAULT);
            $user->setPassword($hashedPassword);

            $this->userRepo->saveUser($user);
            $this->emailService->sendWelcomeEmail($user);

            return true;
        } catch (Throwable $e) {
            throw new RuntimeException("Failed to Register {$user->getFirstName()} User" . $e->getMessage(), 0, $e);
        }
    }

    /**
     * @param User $employee
     * @param UserRole $role (HR_ADMIN, INTERVIEWER, SHADOW_INTERVIEWER, etc.)
     * @return bool
     * @throws RuntimeException|InvalidArgumentException
     */
    public function createEmployee(User $employee, UserRole $role): bool
    {
        if ($role === UserRole::CANDIDATE) {
            throw new InvalidArgumentException();
        }

        $employee->setRole($role);

        try {
            $hashedPassword = password_hash($employee->getPassword(), PASSWORD_DEFAULT);
            $employee->setPassword($hashedPassword);

            $this->userRepo->saveUser($employee);

            $this->emailService->sendEmployeeWelcomeEmail($employee);

            return true;
        } catch (Throwable $e) {
            throw new RuntimeException("Failed to Register {$employee->getFirstName()} in {$employee->getRole()}" . $e->getMessage(), 0, $e);
        }
    }

    /**
     * @param string $email
     * @param string $password
     * @return array Returns user data (including Role) without password
     * @throws InvalidArgumentException
     */
    public function login(string $email, string $password): array
    {
        $userData = $this->userRepo->findUserByEmail($email);

        if (!$userData || !password_verify($password, $userData['password'])) {
            throw new InvalidArgumentException("Invalid email or password");
        }

        unset($userData['password']);

        return $userData;
    }

    /**
     * @param string $email
     * @param string $countryCode
     * @param string $phoneNumber
     * @param string $newPassword
     * @return bool
     * @throws InvalidArgumentException|RuntimeException
     */
    public function forgetPassword(string $email, string $countryCode, string $phoneNumber, string $newPassword): bool
    {
        $userData = $this->userRepo->findUserByEmail($email);

        if (!$userData || $userData['phone_number'] !== $phoneNumber) {
            throw new InvalidArgumentException();
        }

        $hashedPassword = password_hash($newPassword, PASSWORD_DEFAULT);

        try {
            return $this->userRepo->updatePassword($userData['id'], $hashedPassword);
        } catch (Throwable $e) {
            throw new RuntimeException();
        }
    }
}