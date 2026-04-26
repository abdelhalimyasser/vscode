<?php

declare(strict_types=1);

namespace App\Model;

use App\Model\Enums\InterviewStatus;

class Interview
{
    private int $id = 0;
    private ?\DateTimeImmutable $scheduledAt = null;
    private ?\DateTimeImmutable $beganAt = null;
    private ?\DateTimeImmutable $endedAt = null;
    private bool $attended = false;
    private ?\DateTimeImmutable $createdAt = null;
    private ?InterviewStatus $interviewStatus = null;

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

    public function getScheduledAt(): ?\DateTimeImmutable
    {
        return $this->scheduledAt;
    }

    /**
     *
     * @param \DateTimeImmutable $scheduledAt
     */
    public function setScheduledAt(\DateTimeImmutable $scheduledAt): void
    {
        $this->scheduledAt = $scheduledAt;
    }

    public function getBeganAt(): ?\DateTimeImmutable
    {
        return $this->beganAt;
    }

    /**
     *
     * @param \DateTimeImmutable $beganAt
     */
    public function setBeganAt(\DateTimeImmutable $beganAt): void
    {
        $this->beganAt = $beganAt;
    }

    public function getEndedAt(): ?\DateTimeImmutable
    {
        return $this->endedAt;
    }

    /**
     *
     * @param \DateTimeImmutable $endedAt
     */
    public function setEndedAt(\DateTimeImmutable $endedAt): void
    {
        $this->endedAt = $endedAt;
    }

    public function getAttended(): bool
    {
        return $this->attended;
    }

    /**
     *
     * @param bool $attended
     */
    public function setAttended(bool $attended): void
    {
        $this->attended = $attended;
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

    public function getInterviewStatus(): ?InterviewStatus
    {
        return $this->interviewStatus;
    }

    /**
     *
     * @param InterviewStatus $interviewStatus
     */
    public function setInterviewStatus(InterviewStatus $interviewStatus): void
    {
        $this->interviewStatus = $interviewStatus;
    }
}