<?php

declare(strict_types=1);

namespace model;
use http\Exception\RuntimeException;
use model\enum\ApplicationsStatus;
use model\enum\ReferralBonusStatus;
/**
 * Class Application
 *
 * Represents an application in the system, which is associated with a candidate and a job posting. It contains information about the application status, match score, referral bonus status, and creation date.
 *
 * @package model
 * @version 1.0
 * @since   26-04-2026
 * @author  Ali Samy
 */
class Application
{
    private string $id;
    private ApplicationsStatus $status;
    private int $matchScore;
    private ReferralBonusStatus $referralBonusStatus;
    private DateTimeImmutable $createdAt;

    /**
     * @param ApplicationsStatus $status
     * @param int $matchScore
     * @param ReferralBonusStatus $referralBonusStatus
     * @param DateTimeImmutable $createdAt
     * @throws Exception
     */
    public function __construct(
        ApplicationsStatus $status,
        int $matchScore,
        ReferralBonusStatus $referralBonusStatus,
        DateTimeImmutable $createdAt
        ) 
    {
        try {
            $this->id = uniqid('app_', true);
            $this->status = $status;
            $this->matchScore = $matchScore;
            $this->referralBonusStatus = $referralBonusStatus;
            $this->createdAt = new DateTimeImmutable();
        } catch (Exception $e) {
            throw new RuntimeException('Error creating Application: ' . $e->getMessage());
        }
    }

    public function getId(): string
    {
        return $this->id;
    }

    /**
     *
     * @param string $id
     */
    public function setId(string $id): void
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

    public function getCreatedAt(): ?DateTimeImmutable
    {
        return $this->createdAt;
    }

    /**
     *
     * @param DateTimeImmutable $createdAt
     */
    public function setCreatedAt(DateTimeImmutable $createdAt): void
    {
        $this->createdAt = $createdAt;
    }
}