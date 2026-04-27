<?php

declare(strict_types=1);

namespace model;

use DateTimeImmutable;
use enum\CounterOfferStatus;
use Exception;
use RuntimeException;


/**
 * Class CounterOfferTracker
 *
 * Represents a counter offer tracker in the system, which is associated with an offer and tracks the requested salary, notes, status,
 * and creation date of the counter offer.
 *
 * @package model
 * @author Abdelhalim Yasser
 * @version 1.0
 * @since 26-04-2026
*/
class CounterOfferTracker
{
    private string $id;
    private float $requestedSalary;
    private string $notes;
    private CounterOfferStatus $status;
    private Offer $offer;
    private DateTimeImmutable $createdAt;

    /**
     * @param float $requestedSalary
     * @param string $notes
     * @param CounterOfferStatus $status
     * @param Offer $offer
     * @throws Exception
    */
    public function __construct(
        float $requestedSalary,
        string $notes,
        CounterOfferStatus $status,
        Offer $offer
    )
    {
        try {
            $this->id = uniqid("counter_offer_", true);
            $this->requestedSalary = $requestedSalary;
            $this->notes = $notes;
            $this->status = $status;
            $this->offer = $offer;
            $this->createdAt = new DateTimeImmutable();
        } catch (Exception $e) {
            throw new RuntimeException('Failed to create CounterOfferTracker: ' . $e->getMessage(), 0, $e);
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

    public function getRequestedSalary(): float
    {
        return $this->requestedSalary;
    }

    /**
     * @param mixed $requestedSalary
     */
    public function setRequestedSalary(float $requestedSalary): void
    {
        $this->requestedSalary = $requestedSalary;
    }

    public function getNotes(): string
    {
        return $this->notes;
    }

    /**
     * @param string $notes
     */
    public function setNotes(string $notes): void
    {
        $this->notes = $notes;
    }

    public function getStatus(): CounterOfferStatus
    {
        return $this->status;
    }

    /**
     * @param CounterOfferStatus $status
     */
    public function setStatus(CounterOfferStatus $status): void
    {
        $this->status = $status;
    }

    public function getOffer(): Offer
    {
        return $this->offer;
    }

    /**
     * @param Offer $offer
     */
    public function setOffer(Offer $offer): void
    {
        $this->offer = $offer;
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