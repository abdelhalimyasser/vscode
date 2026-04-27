<?php

declare(strict_types=1);

namespace repositories;

use model\Database;
use model\User;

use Exception;
use PDO;
use RuntimeException;
use Throwable;

/**
 * Class UserRepository
 *
 * Represents the UserRepository in a system, responsible for handling user-related database operations.
 *
 * @package repositories
 * @author Abdelhalim Yasser
 * @version 1.0
 * @since 27-04-2026
*/
class UserRepository
{
    private PDO $pdo;

    /**
     * @param PDO $pdo
     * @throws RuntimeException if there is an error during the initialization of the UserRepository
    */
    public function __construct(PDO $pdo)
    {
        try {
            $this->pdo = $pdo;
        } catch (Throwable $e) {
            throw new RuntimeException('Error initializing UserRepository: ' . $e->getMessage(), 0, $e);
        }
    }

    /**
     * @return PDO
     */
    public function getPdo(): PDO
    {
        return $this->pdo;
    }

    /**
     * @param PDO $pdo
     */
    public function setPdo(PDO $pdo): void
    {
        $this->pdo = $pdo;
    }

    private function fetchFromDatabase(
        ?string $column = null,
        ?string $value = null,
        ?int $limit = null
    ): ?array {

        $sql = "SELECT * FROM users";
        $params = [];

        if ($column !== null && $value !== null) {
            $sql .= " WHERE {$column} = :value";
            $params['value'] = $value;
        } else {
            $sql .= " ORDER BY first_name ASC";
        }

        if ($limit !== null) {
            if ($limit <= 0) {
                throw new \InvalidArgumentException('Limit must be a positive integer.');
            }
            $sql .= " LIMIT :limit";
        }

        try {
            $stmt = $this->pdo->prepare($sql);

            if (isset($params['value'])) {
                $stmt->bindValue(':value', $params['value']);
            }
            if ($limit !== null) {
                $stmt->bindValue(':limit', $limit, PDO::PARAM_INT);
            }

            $stmt->execute();

            $result = $stmt->fetch(PDO::FETCH_ASSOC);

            return $result ?: null;

        } catch (Throwable $e) {
            throw new RuntimeException("Database error: " . $e->getMessage(), 0, $e);
        }
    }

    /**
     * Find a user by their ID.
     *
     * @param string $id
     * @return array|null
     * @throws RuntimeException if there is an error during the database query
     */
    public function findUserById(string $id): ?array
    {
        return $this->fetchFromDatabase('id', $id);
    }

    /**
     * Find a user by their email address.
     *
     * @param string $email
     * @return array|null
     * @throws RuntimeException if there is an error during the database query
     */
    public function findUserByEmail(string $email): ?array
    {
        return $this->fetchFromDatabase('email', $email);
    }

    /**
     * Find a User by their phone number.
     *
     * @param string $phoneNumber
     * @return array|null
     * @throws RuntimeException if there is an error during the database query
     */
    public function findUserByPhoneNumber(string $phoneNumber): ?array
    {
        return $this->fetchFromDatabase('phone_number', $phoneNumber);
    }

    public function getAllUsers(?int $limit = null): ?array
    {
        return $this->fetchFromDatabase(null, null, $limit);
    }
}
