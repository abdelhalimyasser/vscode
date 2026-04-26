<?php

declare(strict_types=1);

namespace App\Model;

use App\Model\Enums\OfferStatus;

class Offer
{
    private int $id = 0;
    private ?mixed $salary = null;
    private ?mixed $signingBonus = null;
    private ?string $stockOptions = null;
    private ?OfferStatus $status = null;
    private ?string $documentPath = null;
    private ?\DateTimeImmutable $createdAt = null;
    private ?\DateTimeImmutable $expiresAt = null;

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

    public function getSalary(): ?mixed
    {
        return $this->salary;
    }

    /**
     *
     * @param mixed $salary
     */
    public function setSalary(mixed $salary): void
    {
        $this->salary = $salary;
    }

    public function getSigningBouns(): mixed
    {
        throw new \BadMethodCallException('Not implemented.');
    }

    /**
     * @param mixed $signingBouns
     */
    public function setSigningBouns(mixed $signingBouns): void
    {
        throw new \BadMethodCallException('Not implemented.');
    }

    public function getStockOptions(): ?string
    {
        return $this->stockOptions;
    }

    /**
     *
     * @param string $stockOptions
     */
    public function setStockOptions(string $stockOptions): void
    {
        $this->stockOptions = $stockOptions;
    }

    public function getStatus(): ?OfferStatus
    {
        return $this->status;
    }

    /**
     *
     * @param OfferStatus $status
     */
    public function setStatus(OfferStatus $status): void
    {
        $this->status = $status;
    }

    public function getDocumentPath(): ?string
    {
        return $this->documentPath;
    }

    /**
     *
     * @param string $documentPath
     */
    public function setDocumentPath(string $documentPath): void
    {
        $this->documentPath = $documentPath;
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

    public function getExpiresAt(): ?\DateTimeImmutable
    {
        return $this->expiresAt;
    }

    /**
     *
     * @param \DateTimeImmutable $expiresAt
     */
    public function setExpiresAt(\DateTimeImmutable $expiresAt): void
    {
        $this->expiresAt = $expiresAt;
    }
}