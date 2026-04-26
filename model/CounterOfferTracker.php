<?php

declare(strict_types=1);

namespace App\Model;

use App\Model\Enums\CounterOfferStatus;

class CounterOfferTracker
{
    private int $id = 0;
    private ?mixed $requestedSalary = null;
    private ?string $notes = null;
    private ?CounterOfferStatus $status = null;
    private ?Offer $offer = null;
    private ?\DateTimeImmutable $createdAt = null;

    public function __construct()
    {
        throw new \BadMethodCallException('Not implemented.');
    }

    public function getId(): int
    {
        return $this->id;
    }

    /**
     *
     * @param int $id
     */
    public function setId(int $id): void
    {
        $this->id = $id;
    }

    public function getRequestedSalary(): ?mixed
    {
        return $this->requestedSalary;
    }

    /**
     *
     * @param mixed $requestedSalary
     */
    public function setRequestedSalary(mixed $requestedSalary): void
    {
        $this->requestedSalary = $requestedSalary;
    }

    public function getNotes(): ?string
    {
        return $this->notes;
    }

    /**
     *
     * @param string $notes
     */
    public function setNotes(string $notes): void
    {
        $this->notes = $notes;
    }

    public function getStatus(): ?CounterOfferStatus
    {
        return $this->status;
    }

    /**
     *
     * @param CounterOfferStatus $status
     */
    public function setStatus(CounterOfferStatus $status): void
    {
        $this->status = $status;
    }

    public function getOffer(): ?Offer
    {
        return $this->offer;
    }

    /**
     *
     * @param Offer $offer
     */
    public function setOffer(Offer $offer): void
    {
        $this->offer = $offer;
    }

    public function getCreatedAt(): ?\DateTimeImmutable
    {
        return $this->createdAt;
    }

    /**
     *
     * @param \DateTimeImmutable $createdAt
     */
    public function setCreatedAt(\DateTimeImmutable $createdAt): void
    {
        $this->createdAt = $createdAt;
    }
}