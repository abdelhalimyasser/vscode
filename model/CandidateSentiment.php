<?php

declare(strict_types=1);

namespace model;

use DateTimeImmutable;
use Exception;
use RuntimeException;

/**
 * Class CandidateSentiment
 *
 * Represents
 *
 * @package model
 * @author
 * @version 1.0
 * @since 27-04-2026
*/
class CandidateSentiment
{
    private string $id;
    private int $platformOverallExperience;
    private int $interviewScore;
    private int $interviewOverallExperience;
    private int $interviewerScore;
    private int $questionsVariety;
    private int $questionsOverallScore;
    private string $notes;
    private DateTimeImmutable $createdAt;

    /***/
    public function __construct()
    {
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

    public function getPlatformOverallExperience(): int
    {
        return $this->platformOverallExperience;
    }

    /**
     * @param int $platformOverallExperience
     */
    public function setPlatformOverallExperience(int $platformOverallExperience): void
    {
        $this->platformOverallExperience = $platformOverallExperience;
    }

    public function getInterviewScore(): int
    {
        return $this->interviewScore;
    }

    /**
     * @param int $interviewScore
     */
    public function setInterviewScore(int $interviewScore): void
    {
        $this->interviewScore = $interviewScore;
    }

    public function getInterviewOverallExperience(): int
    {
        return $this->interviewOverallExperience;
    }

    /**
     * @param int $interviewOverallExperience
     */
    public function setInterviewOverallExperience(int $interviewOverallExperience): void
    {
        $this->interviewOverallExperience = $interviewOverallExperience;
    }

    public function getInterviewerScore(): int
    {
        return $this->interviewerScore;
    }

    /**
     * @param int $interviewerScore
     */
    public function setInterviewerScore(int $interviewerScore): void
    {
        $this->interviewerScore = $interviewerScore;
    }

    public function getQuestionsVariety(): int
    {
        return $this->questionsVariety;
    }

    /**
     * @param int $questionsVariety
     */
    public function setQuestionsVariety(int $questionsVariety): void
    {
        $this->questionsVariety = $questionsVariety;
    }

    public function getQuestionsOverallScore(): int
    {
        return $this->questionsOverallScore;
    }

    /**
     * @param int $questionsOverallScore
     */
    public function setQuestionsOverallScore(int $questionsOverallScore): void
    {
        $this->questionsOverallScore = $questionsOverallScore;
    }

    public function getNotes(): ?string
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