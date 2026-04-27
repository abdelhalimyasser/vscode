<?php

declare(strict_types=1);

namespace repositories;

use services\EmailService;
use models\User;

use Exception;
use PDO;
use RuntimeException;
use InvalidArgumentException;
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

    // PDO Getters and Setters
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

    // Boolean User Cheacks Functions

    /**
     * Check if a specific value exists in a specified column of the users table.
     *
     * @param string $column This is the column name to check (e.g., 'email', 'phone_number', 'id').
     * @param string $value This is the value to check for in the specified column.
     * @return bool
     * @throws RuntimeException if there is an error during the database query
     */
    public function valueExists(string $column, string $value): bool
    {
        if ($column != 'email' && $column != 'phone_number' && $column != 'id') {
            throw new \InvalidArgumentException('Invalid column name. Allowed values are: email, phone_number, id.');
        }

        $sql = "SELECT COUNT(*) FROM users WHERE {$column} = :value";

        try {
            $stmt = $this->pdo->prepare($sql);
            $stmt->bindValue(':value', $value);
            $stmt->execute();

            return $stmt->fetchColumn() > 0;
        } catch (Throwable $e) {
            throw new RuntimeException("Database error: " . $e->getMessage(), 0, $e);
        }
    }

    public function userExistsByEmail(string $email): bool
    {
        return $this->valueExists('email', $email);
    }

    public function userExistsByPhoneNumber(string $phoneNumber): bool
    {
        return $this->valueExists('phone_number', $phoneNumber);
    }

    public function userExistsById(string $id): bool
    {
        return $this->valueExists('id', $id);
    }

//    public function isDuplicated(User) : bool
//    {
//        return $this->userExistsByEmail($user->getEmail()) || $this->userExistsByPhoneNumber($user->getPhoneNumber());
//    }

    // Find and Search User Functions

    /**
     * Fetch user data based on a specified column and value, or fetch all users if no column is provided.
     *
     * @param string|null $column The column to search by (e.g., 'id', 'email', 'phone_number'). If null, it will fetch all users.
     * @param string|null $value The value to search for in the specified column. Ignored if $column is null.
     * @param int|null $limit The maximum number of users to return. If null, it will return all matching users.
     * @return array|null
     * @throws RuntimeException if there is an error during the database query
     */
    public function fetchUserData(?string $column = null, ?string $value = null, ?int $limit = null): ?array {
        if ($column !== null && $column != 'email' && $column != 'phone_number' && $column != 'id') {
            throw new \InvalidArgumentException('Invalid column name. Allowed values are: email, phone_number, id.');
        }

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
        return $this->fetchUserData('id', $id);
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
        return $this->fetchUserData('email', $email);
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
        return $this->fetchUserData('phone_number', $phoneNumber);
    }

    /**
     * Get all the users and can make limit the number of users returned by passing a limit parameter.
     *
     * @param int|null $limit
     * @return array|null
     * @throws RuntimeException if there is an error during the database query
     */
    public function getAllUsers(?int $limit = null): ?array
    {
        return $this->fetchUserData(null, null, $limit);
    }

    // Save User Functions
    /**
     * Helper function to check if a user can be created without conflicts.
     * Prevents duplicate accounts based on unique constraints.
     *
     * @param User $user The User object to validate.
     * @return bool Returns true if duplicated, false if safe to create.
     */
    public function isDuplicated(User $user): bool
    {
        return $this->userExistsById($user->getId())
            || $this->userExistsByEmail($user->getEmail())
            || $this->userExistsByPhoneNumber($user->getPhoneNumber());
    }

    /**
     * Save a new user and their associated skills using a transaction.
     * @param User $user The User entity to be persisted.
     * @return bool Returns true on successful persistence.
     * @throws RuntimeException if the database operation fails.
     */
    public function saveUser(User $user): bool
    {
        if ($this->isDuplicated($user)) {
            throw new RuntimeException('User with this Email, ID or Phone already exists.');
        }

        try {
            $this->pdo->beginTransaction();

            $userSql = "INSERT INTO users (
                id, first_name, last_name, birth_date, email, country_code, 
                phone_number, role, password, experience_year, resume_path, docs, created_at
            ) VALUES (
                :id, :first_name, :last_name, :birth_date, :email, :country_code, 
                :phone_number, :role, :password, :experience_year, :resume_path, :docs, :created_at
            )";

            $stmt = $this->pdo->prepare($userSql);
            $stmt->execute([
                ':id'              => $user->getId(),
                ':first_name'      => $user->getFirstName(),
                ':last_name'       => $user->getLastName(),
                ':birth_date'      => $user->getBirthDate()?->format('Y-m-d'),
                ':email'           => $user->getEmail(),
                ':country_code'    => $user->getCountryCode(),
                ':phone_number'    => $user->getPhoneNumber(),
                ':role'            => $user->getRole()?->value,
                ':password'        => $user->getPassword(),
                ':experience_year' => $user->getExperienceYear(),
                ':resume_path'     => $user->getResumePath(),
                ':docs'            => $user->getDocs(),
                ':created_at'      => $user->getCreatedAt()?->format('d-m-Y-H-i-s')
            ]);

            $skills = $user->getUserSkills();
            if (!empty($skills)) {
                $skillSql = "INSERT INTO skills (user_id, skill_name) VALUES (:user_id, :skill_name)";
                $skillStmt = $this->pdo->prepare($skillSql);

                foreach ($skills as $skill) {
                    $skillStmt->execute([
                        ':user_id'    => $user->getId(),
                        ':skill_name' => $skill
                    ]);
                }
            }

            $this->pdo->commit();

            $emailService = new EmailService();
            $emailService->sendWelcomeEmail($user);

            return true;
        } catch (Throwable $e) {
            if ($this->pdo->inTransaction()) {
                $this->pdo->rollBack();
            }
            throw new RuntimeException("Failed to save user and skills: " . $e->getMessage(), 0, $e);
        }
    }

    // Update User Functions
    /**
     * Update a user's data based on a specified column and flag. The column parameter specifies which user attribute to update (e.g., email, phone_number, first_name, last_name),
     * while the flag parameter specifies which attribute to use for identifying the user (e.g., email, phone_number, id).
     * The value parameter is used both for identifying the user and for setting the new value of the specified column.
     *
     * @param string $column This is the column name to update (e.g., 'email', 'phone_number', 'first_name', 'last_name').
     * @param string $flag This is the column name to identify the user (e.g., 'email', 'phone_number', 'id').
     * @param string $newValue The new value to set.
     * @param string $search The value to search for in the flag column to identify the user to update.
     * @return bool
     * @throws RuntimeException if there is an error during the database query
     */
    public function updateUserData(string $column, string $flag, string $newValue, string $search): bool
    {
        $allowedColumns = ['email', 'phone_number', 'first_name', 'last_name', 'hashed_password'];
        $allowedFlags   = ['email', 'phone_number', 'id'];

        if (!in_array($column, $allowedColumns) || !in_array($flag, $allowedFlags)) {
            throw new InvalidArgumentException('Invalid column name. Allowed values are: email, phone_number, first_name, last_name, hashed_password.');
        }

        $sql = "UPDATE users SET {$column} = :newValue WHERE {$flag} = :flagValue";

        try {
            $stmt = $this->pdo->prepare($sql);
            $stmt->bindValue(':newValue', $newValue);
            $stmt->bindValue(':flagValue', $search);
            return $stmt->execute();
        } catch (Throwable $e) {
            throw new RuntimeException("Database error: " . $e->getMessage(), 0, $e);
        }
    }

    /**
     * Update a user's email address based on a specified flag (e.g., email, phone_number, id).
     *
     * @param string $email
     * @param string $flag
     * @param string $search
     * @return bool
     */
    public function updateUserEmail(string $email, string $flag, string $search): bool
    {
        return $this->updateUserData('email', $flag, $email, $search);
    }

    /**
     * Update a user's phone number based on a specified flag (e.g., email, phone_number, id).
     *
     * @param string $phoneNumber
     * @param string $flag
     * @param string $search
     * @return bool
     */
    public function updateUserPhoneNumber(string $phoneNumber, string $flag, string $search): bool
    {
        return $this->updateUserData('phone_number', $flag, $phoneNumber, $search);
    }

    /**
     * Update a user's first name based on a specified flag (e.g., email, phone_number, id).
     *
     * @param string $firstName
     * @param string $flag
     * @param string $search
     * @return bool
     */
    public function updateUserFirstName(string $firstName, string $flag, string $search): bool
    {
        return $this->updateUserData('first_name', $flag, $firstName, $search);
    }

    /**
     * Update a user's last name based on a specified flag (e.g., email, phone_number, id).
     *
     * @param string $lastName
     * @param string $flag
     * @param string $search
     * @return bool
     */
    public function updateUserLastName(string $lastName, string $flag, string $search): bool
    {
        return $this->updateUserData('last_name', $flag, $lastName, $search);
    }

    /**
     * Update a user's password based on their ID. This method allows updating the user's password by providing their unique identifier (ID) and the new hashed password.
     *
     * @param string $id
     * @param string $hashedPassword
     * @return bool
     */
    public function updatePassword(string $id, string $hashedPassword): bool
    {
        return $this->updateUserData('hashed_password', 'id', $hashedPassword, $id);
    }

    // Delete User Functions

    /**
     * Delete a user from the database based on a specified column and value.
     * This method removes a user record from the users table matching the given criteria.
     *
     * @param string $column The column to search by (e.g., 'id', 'email', 'phone_number'). Must be one of the allowed values.
     * @param string $value The value to search for in the specified column to identify the user to delete.
     * @return bool Returns true if the user was successfully deleted, false otherwise.
     * @throws InvalidArgumentException if the column is not one of the allowed values.
     * @throws RuntimeException if there is an error during the database query.
     */
    public function deleteUser(string $column, string $value): bool
    {
        if ($column != 'email' && $column != 'phone_number' && $column != 'id') {
            throw new InvalidArgumentException('Invalid column name. Allowed values are: email, phone_number, id.');
        }

        if (empty($value)) {
            throw new InvalidArgumentException('Value cannot be empty.');
        }

        $sql = "DELETE FROM users WHERE {$column} = :value";

        try {
            $stmt = $this->pdo->prepare($sql);
            $stmt->bindValue(':value', $value);
            return $stmt->execute();
        } catch (Throwable $e) {
            throw new RuntimeException("Database error: " . $e->getMessage(), 0, $e);
        }
    }

    /**
     * Delete a user by their ID.
     *
     * @param string $id The unique identifier of the user to delete.
     * @return bool Returns true if the user was successfully deleted, false otherwise.
     * @throws RuntimeException if there is an error during the database query.
     */
    public function deleteUserById(string $id): bool
    {
        return $this->deleteUser('id', $id);
    }

    /**
     * Delete a user by their email address.
     *
     * @param string $email The email address of the user to delete.
     * @return bool Returns true if the user was successfully deleted, false otherwise.
     * @throws RuntimeException if there is an error during the database query.
     */
    public function deleteUserByEmail(string $email): bool
    {
        return $this->deleteUser('email', $email);
    }

    /**
     * Delete a user by their phone number.
     *
     * @param string $phoneNumber The phone number of the user to delete.
     * @return bool Returns true if the user was successfully deleted, false otherwise.
     * @throws RuntimeException if there is an error during the database query.
     */
    public function deleteUserByPhoneNumber(string $phoneNumber): bool
    {
        return $this->deleteUser('phone_number', $phoneNumber);
    }
}