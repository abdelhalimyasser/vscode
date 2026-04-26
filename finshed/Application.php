<?php

declare(strict_types=1);

namespace App\Model;

use App\Model\Enums\ApplicationsStatus;
use App\Model\Enums\ReferralBonusStatus;

class Application
{
    private int $id = 0;
    private ?ApplicationsStatus $status = null;
    private int $matchScore = 0;
    private ?ReferralBonusStatus $referralBonusStatus = null;
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

    public function getStatus(): ?ApplicationsStatus
    {
        return $this->status;
    }

    /**
     *
     * @param ApplicationsStatus $status
     */
    public function setStatus(ApplicationsStatus $status): void
    {
        $this->status = $status;
    }

    public function getMatchScore(): int
    {
        return $this->matchScore;
    }

    /**
     *
     * @param int $matchScore
     */
    public function setMatchScore(int $matchScore): void
    {
        $this->matchScore = $matchScore;
    }

    public function getReferralBonusStatus(): ?ReferralBonusStatus
    {
        return $this->referralBonusStatus;
    }

    /**
     *
     * @param ReferralBonusStatus $referralBonusStatus
     */
    public function setReferralBonusStatus(ReferralBonusStatus $referralBonusStatus): void
    {
        $this->referralBonusStatus = $referralBonusStatus;
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