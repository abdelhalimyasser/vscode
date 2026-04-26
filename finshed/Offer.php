<?php

declare(strict_types=1);

namespace model;

use model\enum\OfferStatus;

use DateTimeImmutable;
use Exception;
use RuntimeException;

/**
 * Class Offer
 *
 * Represents an offer in the system, which is associated with a candidate and a job posting.
 *
 * @package model
 * @author Abdelhalim Yasser
 * @version 1.0
 * @since 27-04-2026
*/

class Offer
{
    private string $id;
    private float $salary;
    private float $signingBonus;
    private string $stockOptions;
    private OfferStatus $status;
    private DateTimeImmutable $expiresAt;
    private DateTimeImmutable $createdAt;

    /**
     * @param float $salary
     * @param float $signingBonus
     * @param string $stockOptions
     * @param OfferStatus $status
     * @param DateTimeImmutable $expiresAt
     * @throws Exception
    */
    public function __construct(
        float $salary,
        float $signingBonus,
        string $stockOptions,
        OfferStatus $status,
        DateTimeImmutable $expiresAt
    )
    {
        try {
            $this->id = uniqid('offer_', true);
            $this->salary = $salary;
            $this->signingBonus = $signingBonus;
            $this->stockOptions = $stockOptions;
            $this->status = $status;
            $this->expiresAt = $expiresAt;
            $this->createdAt = new DateTimeImmutable();
        } catch (Exception $e) {
            throw new RuntimeException('Failed to create Offer: ' . $e->getMessage(), 0, $e);
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

    public function getSigningBouns(): float
    {
        return $this->signingBonus;
    }

    /**
     * @param float $signingBouns
     */
    public function setSigningBouns(float $signingBouns): void
    {
        $this->signingBonus = $signingBouns;
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

    public function getStatus(): OfferStatus
    {
        return $this->status;
    }

    /**
     * @param OfferStatus $status
     */
    public function setStatus(OfferStatus $status): void
    {
        $this->status = $status;
    }


    public function getExpiresAt(): DateTimeImmutable
    {
        return $this->expiresAt;
    }

    /**
     *
     * @param DateTimeImmutable $expiresAt
     */
    public function setExpiresAt(DateTimeImmutable $expiresAt): void
    {
        $this->expiresAt = $expiresAt;
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