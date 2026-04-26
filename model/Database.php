<?php

declare(strict_types=1);

namespace App\Model;

class Database
{
    private ?string $host = null;
    private ?string $dbname = null;
    private ?string $username = null;
    private ?string $password = null;
    private ?mixed $connection = null;

    public function connect(): void
    {
        throw new \BadMethodCallException('Not implemented.');
    }

    public function static function getConnection(): PDO
    {
        
    }

    public function disconnect(): void
    {
        throw new \BadMethodCallException('Not implemented.');
    }
}