<?php

declare(strict_types=1);

namespace App\Model;

class Authenticate
{
    /**
     * @param User $user
     */
    public function createAccount(User $user): bool
    {
        throw new \BadMethodCallException('Not implemented.');
    }

    /**
     * @param string $email
     * @param string $password
     */
    public function login(string $email, string $password): bool
    {
        throw new \BadMethodCallException('Not implemented.');
    }

    /**
     * @param string $email
     * @param string $phoneNumber
     */
    public function forgetPassword(string $email, string $phoneNumber): bool
    {
        throw new \BadMethodCallException('Not implemented.');
    }
}