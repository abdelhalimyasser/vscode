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
 * @author
 * @version 1.0
 * @since 27-04-2026
*/
class InterviewerAvailability
{
    private int $id = 0;
    private ?\DateTimeImmutable $startTime = null;
    private ?\DateTimeImmutable $endTime = null;
    private bool $isBooked = false;
    private int $interviewerId = 0;

    /***/
    public function __construct()
    {
        throw new \BadMethodCallException('Not implemented.');
    }

    public function getId(): int
    {
        return $this->id;
    }

    /**
     * @param int $id
     */
    public function setId(int $id): void
    {
        $this->id = $id;
    }

    public function getStartTime(): ?\DateTimeImmutable
    {
        return $this->startTime;
    }

    /**
     * @param DateTimeImmutable $startTime
     */
    public function setStartTime(\DateTimeImmutable $startTime): void
    {
        $this->startTime = $startTime;
    }

    public function getEndTime(): ?\DateTimeImmutable
    {
        return $this->endTime;
    }

    /**
     * @param \DateTimeImmutable $endTime
     */
    public function setEndTime(\DateTimeImmutable $endTime): void
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