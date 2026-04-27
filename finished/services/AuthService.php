<?php

namespace services;

use model\User;

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
    public function login($email, $password)
    {
        // Implement login logic here
    }

    public function register(User $user)
    {
        // Implement registration logic here
    }

    public function forgetPassword(string $email, string $countryCode, string $phoneNumber)
    {
        // Implement forget password logic here
    }
}