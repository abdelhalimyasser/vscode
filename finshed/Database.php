<?php

declare(strict_types=1);

namespace model;

use PDO;
use PDOException;

/**
 * Class Database
 *
 * Represents Database in a system,
 *
 * @package model
 * @author Abdelhalim Yasser
 * @version 1.0
 * @since 26-04-2026
*/

class Database
{
    private static ?PDO $connection = null;

    private static string $host = 'localhost';
    private static string $dbname = 'nexthire_db';
    private static string $username = 'root';
    private static string $password = '';

    private function __construct() {}

    public static function getConnection(): PDO
    {
        if (self::$connection === null) {
            try {
                $dsn = "mysql:host=" . self::$host . ";dbname=" . self::$dbname . ";charset=utf8mb4";

                self::$connection = new PDO($dsn, self::$username, self::$password, [
                    PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
                    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
                    PDO::ATTR_EMULATE_PREPARES => false,
                ]);
            } catch (PDOException $e) {
                die("Error in database connection, " . $e->getMessage());
            }
        }

        return self::$connection;
    }
}