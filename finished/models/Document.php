<?php

declare(strict_types=1);

namespace models;

use DateTimeImmutable;
use Exception;
use RuntimeException;
use BadMethodCallException;

/**
 * Class
 *
 * Represents a document in the system, which can be used for various purposes such as offer letters, contracts, or other official communications.
 *
 * @package model
 * @author Ali Samy
 * @version 1.0
 * @since 27-04-2026
*/
class Document
{
    private string $id;
    private string $to;
    private string $from;
    private DateTimeImmutable $date;
    private float $salary;
    private float $bonus;
    private string $stockOptions;
    private string $path;
    private DateTimeImmutable $createdAt;

    /**
     * @param string $to
     * @param string $from
     * @param DateTimeImmutable $date
     * @param float $salary
     * @param float $bonus
     * @param string $stockOptions
     * @param string $path
     * @param DateTimeImmutable $createdAt
     * @throws Exception
    */
    public function __construct(
        string $to,
        string $from,
        DateTimeImmutable $date,
        float $salary,
        float $bonus,
        string $stockOptions,
        string $path,
        DateTimeImmutable $createdAt
    ) {
        try {
            $this->id = uniqid('doc_', true);
            $this->to = $to;
            $this->from = $from;
            $this->date = $date;
            $this->salary = $salary;
            $this->bonus = $bonus;
            $this->stockOptions = $stockOptions;
            $this->path = $path;
            $this->createdAt = new DateTimeImmutable();
        } catch (Exception $e) {
            throw new RuntimeException('Error creating Document: ' . $e->getMessage(), 0, $e);
        }
    }
    public function getId(): string
    {
        return $this->id;
    }

    /**
     * @param string $id
     */
    public function setId(string $id): void
    {
        $this->id = $id;
    }

    public function getSendTo(): string
    {
        throw new BadMethodCallException('Not implemented.');
    }

    /**
     * @param string $to
     */
    public function setSendTo(string $sendTo): void
    {
        throw new BadMethodCallException('Not implemented.');
    }

    public function getFrom(): string
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

    public function getDate(): DateTimeImmutable
    {
        return $this->date;
    }

    /**
     * @param DateTimeImmutable $date
     */
    public function setDate(DateTimeImmutable $date): void
    {
        $this->date = $date;
    }

    public function getSalary(): float
    {
        return $this->salary;
    }

    /**
     * @param float $salary
     */
    public function setSalary(float $salary): void
    {
        $this->salary = $salary;
    }

    public function getBonus(): float
    {
        return $this->bonus;
    }

    /**
     * @param float $bonus
     */
    public function setBonus(float $bonus): void
    {
        $this->bonus = $bonus;
    }

    public function getStockOptions(): string
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

    public function getPath(): string
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

    public function getCreatedAt(): DateTimeImmutable
    {
        return $this->createdAt;
    }

    /**
     * @param DateTimeImmutable $createdAt
     */
    public function setCreatedAt(DateTimeImmutable $createdAt): void
    {
        $this->createdAt = $createdAt;
    }
}