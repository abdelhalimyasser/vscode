<?php

declare(strict_types=1);

namespace model;

use DateTimeImmutable;
use Exception;
use RuntimeException;
use enum\InterviewStatus;

/**
 * Class
 *
 * Represents
 *
 * @package model
 * @author Ali Samy
 * @version 1.0
 * @since 27-04-2026
*/
class Interview
{
    private string $id;
    private DateTimeImmutable $scheduledAt;
    private DateTimeImmutable $beganAt;
    private DateTimeImmutable $endedAt;
    private bool $attended;
    private DateTimeImmutable $createdAt;
    private InterviewStatus $interviewStatus;

    /**
     * @param DateTimeImmutable $scheduledAt
     * @param DateTimeImmutable $beganAt
     * @param DateTimeImmutable $endedAt
     * @param bool $attended
     * @param DateTimeImmutable $createdAt
     * @param InterviewStatus $interviewStatus
     * @throws Exception
    */
    public function __construct(
        DateTimeImmutable $scheduledAt,
        DateTimeImmutable $beganAt,
        DateTimeImmutable $endedAt,
        bool $attended,
        DateTimeImmutable $createdAt,
        InterviewStatus $interviewStatus
    ) {
        try {
            $this->id = uniqid('interview_', true);
            $this->scheduledAt = $scheduledAt;
            $this->beganAt = $beganAt;
            $this->endedAt = $endedAt;
            $this->attended = $attended;
            $this->createdAt = new DateTimeImmutable();
            $this->interviewStatus = $interviewStatus;
        } catch (Exception $e) {
            throw new RuntimeException('Error creating interview: ' . $e->getMessage(), 0, $e);
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

    public function getScheduledAt(): DateTimeImmutable
    {
        return $this->scheduledAt;
    }

    /**
     * @param DateTimeImmutable $scheduledAt
     */
    public function setScheduledAt(DateTimeImmutable $scheduledAt): void
    {
        $this->scheduledAt = $scheduledAt;
    }

    public function getBeganAt(): DateTimeImmutable
    {
        return $this->beganAt;
    }

    /**
     * @param DateTimeImmutable $beganAt
     */
    public function setBeganAt(DateTimeImmutable $beganAt): void
    {
        $this->beganAt = $beganAt;
    }

    public function getEndedAt(): DateTimeImmutable
    {
        return $this->endedAt;
    }

    /**
     * @param DateTimeImmutable $endedAt
     */
    public function setEndedAt(DateTimeImmutable $endedAt): void
    {
        $this->endedAt = $endedAt;
    }

    public function getAttended(): bool
    {
        return $this->attended;
    }

    /**
     * @param bool $attended
     */
    public function setAttended(bool $attended): void
    {
        $this->attended = $attended;
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

    public function getInterviewStatus(): InterviewStatus
    {
        return $this->interviewStatus;
    }

    /**
     * @param InterviewStatus $interviewStatus
     */
    public function setInterviewStatus(InterviewStatus $interviewStatus): void
    {
        $this->interviewStatus = $interviewStatus;
    }
}