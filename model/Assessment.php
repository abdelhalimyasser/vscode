<?php

declare(strict_types=1);

namespace App\Model;

use App\Model\Enums\AssessmentLanguage;

class Assessment
{
    private int $id = 0;
    private ?AssessmentLanguage $language = null;
    private ?string $code = null;
    private int $plagiarismScore = 0;
    private ?\DateTimeImmutable $startedAt = null;
    private ?\DateTimeImmutable $submittedAt = null;
    private ?mixed $status = null;

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

    public function getLanguage(): ?AssessmentLanguage
    {
        return $this->language;
    }

    /**
     *
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
     *
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
     *
     * @param int $plagiarismScore
     */
    public function setPlagiarismScore(int $plagiarismScore): void
    {
        $this->plagiarismScore = $plagiarismScore;
    }

    public function getStartedAt(): ?\DateTimeImmutable
    {
        return $this->startedAt;
    }

    /**
     *
     * @param \DateTimeImmutable $startedAt
     */
    public function setStartedAt(\DateTimeImmutable $startedAt): void
    {
        $this->startedAt = $startedAt;
    }

    public function getSubmittedAt(): ?\DateTimeImmutable
    {
        return $this->submittedAt;
    }

    /**
     *
     * @param \DateTimeImmutable $submittedAt
     */
    public function setSubmittedAt(\DateTimeImmutable $submittedAt): void
    {
        $this->submittedAt = $submittedAt;
    }

    public function getStatus(): ?mixed
    {
        return $this->status;
    }

    /**
     *
     * @param mixed $status
     */
    public function setStatus(mixed $status): void
    {
        $this->status = $status;
    }

    public function addAssessmentLog(): void
    {
        throw new \BadMethodCallException('Not implemented.');
    }
}