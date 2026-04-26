<?php

declare(strict_types=1);

namespace App\Model;

class UserRepository
{
    /**
     * @param int $id
     */
    public function findUserById(int $id): User
    {
        throw new \BadMethodCallException('Not implemented.');
    }

    /**
     * @param string $email
     */
    public function findUserByEmail(string $email): User
    {
        throw new \BadMethodCallException('Not implemented.');
    }

    /**
     * @param string $phoneNumber
     */
    public function findUserByPhoneNumber(string $phoneNumber): User
    {
        throw new \BadMethodCallException('Not implemented.');
    }

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