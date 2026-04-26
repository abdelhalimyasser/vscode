<?php

declare(strict_types=1);

namespace App\Model;

use App\Model\Enums\EventType;

class AssessmentLog
{
    private int $id = 0;
    private ?EventType $eventType = null;
    private int $assessmentId = 0;
    private ?\DateTimeImmutable $timestamp = null;

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

    public function getEventType(): ?EventType
    {
        return $this->eventType;
    }

    /**
     *
     * @param EventType $eventType
     */
    public function setEventType(EventType $eventType): void
    {
        $this->eventType = $eventType;
    }

    public function getAssessmentId(): int
    {
        return $this->assessmentId;
    }

    /**
     *
     * @param int $assessmentId
     */
    public function setAssessmentId(int $assessmentId): void
    {
        $this->assessmentId = $assessmentId;
    }

    public function getTimestamp(): ?\DateTimeImmutable
    {
        return $this->timestamp;
    }

    /**
     *
     * @param \DateTimeImmutable $timestamp
     */
    public function setTimestamp(\DateTimeImmutable $timestamp): void
    {
        $this->timestamp = $timestamp;
    }
}