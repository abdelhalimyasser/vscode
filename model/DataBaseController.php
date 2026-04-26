<?php

declare(strict_types=1);

namespace App\Model;

class DataBaseController
{
    private ?string $host = null;
    private ?string $db_name = null;
    private ?string $username = null;
    private ?string $password = null;
    private int $conn = 0;

    public function __construct()
    {
        throw new \BadMethodCallException('Not implemented.');
    }

    public function connect(): void
    {
        throw new \BadMethodCallException('Not implemented.');
    }

    public function close(): void
    {
        throw new \BadMethodCallException('Not implemented.');
    }

    public function getConn(): int
    {
        return $this->conn;
    }

    /**
     * @param int $sQL
     */
    public function query(int $sQL): void
    {
        throw new \BadMethodCallException('Not implemented.');
    }
}