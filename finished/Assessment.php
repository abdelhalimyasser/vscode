<?php

declare(strict_types=1);

namespace model;

use DateTimeImmutable;
use Exception;
use model\enum\AssessmentLanguage;
use model\enum\AssessmentStatus;
use RuntimeException;

/**
 * Class Assessment
 *
 * Represents an assessment in the system, which is associated with a candidate and a job posting.
 * It includes details such as the programming language used, the code submitted, plagiarism score, start and submission times, and status.
 *
 * @package model
 * @author Abdelhalim Yasser
 * @version 1.0
 * @since 27-04-2026
*/
class Assessment
{
    private string $id;
    private AssessmentLanguage $language;
    private string $code;
    private int $plagiarismScore;
    private AssessmentStatus $status;
    private DateTimeImmutable $startedAt;
    private DateTimeImmutable $submittedAt;
    private DateTimeImmutable $createdAt;

    /***/
    public function __construct(
        AssessmentLanguage $assessmentLanguage,
        string $code,
        int $plagiarismScore,
        AssessmentStatus $status,
        DateTimeImmutable $startedAt,
        DateTimeImmutable $submittedAt
    )
    {
        try {
            $this->id = uniqid('assessment_', true);
            $this->language = $assessmentLanguage;
            $this->code = $code;
            $this->plagiarismScore = $plagiarismScore;
            $this->status = $status;
            $this->startedAt = $startedAt;
            $this->submittedAt = $submittedAt;
            $this->createdAt = new DateTimeImmutable();
        } catch (Exception $e) {
            throw new RuntimeException('Failed to create Assessment: ' . $e->getMessage(), 0, $e);
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

    public function getLanguage(): ?AssessmentLanguage
    {
        return $this->language;
    }

    /**
     * @param AssessmentLanguage $language
     */
    public function setLanguage(AssessmentLanguage $language): void
    {
        $this->language = $language;
    }

    public function getCode(): ?string
    {
        return $this->code;
    }

    /**
     * @param string $code
     */
    public function setCode(string $code): void
    {
        $this->code = $code;
    }

    public function getPlagiarismScore(): int
    {
        return $this->plagiarismScore;
    }

    /**
     * @param int $plagiarismScore
     */
    public function setPlagiarismScore(int $plagiarismScore): void
    {
        $this->plagiarismScore = $plagiarismScore;
    }

    public function getStartedAt(): ?DateTimeImmutable
    {
        return $this->startedAt;
    }

    /**
     * @param DateTimeImmutable $startedAt
     */
    public function setStartedAt(DateTimeImmutable $startedAt): void
    {
        $this->startedAt = $startedAt;
    }

    public function getSubmittedAt(): ?DateTimeImmutable
    {
        return $this->submittedAt;
    }

    /**
     * @param DateTimeImmutable $submittedAt
     */
    public function setSubmittedAt(DateTimeImmutable $submittedAt): void
    {
        $this->submittedAt = $submittedAt;
    }

    public function getStatus(): ?AssessmentStatus
    {
        return $this->status;
    }

    /**
     * @param AssessmentStatus $status
     */
    public function setStatus(AssessmentStatus $status): void
    {
        $this->status = $status;
    }

    public function getCreatedAt(): ?DateTimeImmutable
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