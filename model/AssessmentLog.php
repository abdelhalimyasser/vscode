<?php

namespace model;

use model\enum\EventType;

use DateTimeImmutable;
use Exception;
use RuntimeException;

/**
 * Class AssessmentLog
 *
 * Represents an event log entry for an assessment, capturing the type of event, the associated assessment ID, and the timestamp of when the event occurred.
 *
 * @package model
 * @author Abdelhalim Yasser
 * @version 1.0
 * @since 27-04-2026
*/
class AssessmentLog
{
    private string $id;
    private EventType $eventType;
    private int $assessmentId = 0;
    private DateTimeImmutable $timestamp;

    /**
     *
    */
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

    public function getEventType(): ?EventType
    {
        return $this->eventType;
    }

    /**
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
     * @param \DateTimeImmutable $timestamp
     */
    public function setTimestamp(\DateTimeImmutable $timestamp): void
    {
        $this->timestamp = $timestamp;
    }
}