<?php

declare(strict_types=1);

namespace model;

use DateTimeImmutable;
use Exception;
use RuntimeException;

/**
 * Class
 *
 * Represents
 *
 * @package model
 * @author
 * @version 1.0
 * @since 27-04-2026
*/
class Document
{
    private int $id;
    private string $to;
    private string $from;
    private DateTimeImmutable $date;
    private mixed $salary;
    private mixed $bonus;
    private string $stockOptions;
    private string $path;
    private DateTimeImmutable $createdAt;

    /***/
    public function getId(): int
    {
        return $this->id;
    }

    /**
     * @param int $id
     */
    public function setId(int $id): void
    {
        $this->id = $id;
    }

    public function getSendTo(): string
    {
        throw new \BadMethodCallException('Not implemented.');
    }

    /**
     * @param string $sendTo
     */
    public function setSendTo(string $sendTo): void
    {
        throw new \BadMethodCallException('Not implemented.');
    }

    public function getFrom(): ?string
    {
        return $this->from;
    }

    /**
     * @param string $from
     */
    public function setFrom(string $from): void
    {
        $this->from = $from;
    }

    public function getDate(): ?\DateTimeImmutable
    {
        return $this->date;
    }

    /**
     * @param DateTimeImmutable $date
     */
    public function setDate(\DateTimeImmutable $date): void
    {
        $this->date = $date;
    }

    public function getSalary(): ?mixed
    {
        return $this->salary;
    }

    /**
     * @param mixed $salary
     */
    public function setSalary(mixed $salary): void
    {
        $this->salary = $salary;
    }

    public function getBonus(): ?mixed
    {
        return $this->bonus;
    }

    /**
     * @param mixed $bonus
     */
    public function setBonus(mixed $bonus): void
    {
        $this->bonus = $bonus;
    }

    public function getStockOptions(): ?string
    {
        return $this->stockOptions;
    }

    /**
     * @param string $stockOptions
     */
    public function setStockOptions(string $stockOptions): void
    {
        $this->stockOptions = $stockOptions;
    }

    public function getPath(): ?string
    {
        return $this->path;
    }

    /**
     * @param string $path
     */
    public function setPath(string $path): void
    {
        $this->path = $path;
    }

    public function getCreatedAt(): ?\DateTimeImmutable
    {
        return $this->createdAt;
    }

    /**
     * @param DateTimeImmutable $createdAt
     */
    public function setCreatedAt(\DateTimeImmutable $createdAt): void
    {
        $this->createdAt = $createdAt;
    }
}