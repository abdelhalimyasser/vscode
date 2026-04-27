<?php

declare(strict_types=1);

namespace model;

use DateTimeImmutable;
use Exception;
use RuntimeException;

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
class InterviewerAvailability
{
    private string $id;
    private DateTimeImmutable $startTime;
    private DateTimeImmutable $endTime;
    private bool $isBooked;
    private int $interviewerId;

    /**
     * @param DateTimeImmutable $startTime
     * @param DateTimeImmutable $endTime
     * @param bool $isBooked
     * @param int $interviewerId
     * @throws Exception
    */
    public function __construct(
        DateTimeImmutable $startTime,
        DateTimeImmutable $endTime,
        bool $isBooked,
        int $interviewerId
    ) {
        try {
            $this->id = uniqid('availability_', true);
            $this->startTime = $startTime;
            $this->endTime = $endTime;
            $this->isBooked = $isBooked;
            $this->interviewerId = $interviewerId;
        } catch (Exception $e) {
            throw new RuntimeException('Error creating interviewer availability: ' . $e->getMessage(), 0, $e);
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

    public function getStartTime(): DateTimeImmutable
    {
        return $this->startTime;
    }

    /**
     * @param DateTimeImmutable $startTime
     */
    public function setStartTime(DateTimeImmutable $startTime): void
    {
        $this->startTime = $startTime;
    }

    public function getEndTime(): DateTimeImmutable
    {
        return $this->endTime;
    }

    /**
     * @param DateTimeImmutable $endTime
     */
    public function setEndTime(DateTimeImmutable $endTime): void
    {
        $this->endTime = $endTime;
    }

    public function getIsBooked(): bool
    {
        return $this->isBooked;
    }

    /**
     * @param bool $isBooked
     */
    public function setIsBooked(bool $isBooked): void
    {
        $this->isBooked = $isBooked;
    }

    public function getInterviewerId(): int
    {
        return $this->interviewerId;
    }

    /**
     * @param int $interviewerId
     */
    public function setInterviewerId(int $interviewerId): void
    {
        $this->interviewerId = $interviewerId;
    }
}