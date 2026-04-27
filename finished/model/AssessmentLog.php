<?php

namespace model;

use DateTimeImmutable;
use enum\EventType;
use Exception;
use RuntimeException;

/**
 * Class AssessmentLog
 *
 * Represents an event log entry for an assessment, capturing the type of event, the associated assessment ID, and the timestamp of when the event occurred.
 *
 * @package model
 * @author Ali Samy
 * @version 1.0
 * @since 27-04-2026
*/
class AssessmentLog
{
    private string $id;
    private EventType $eventType;
    private int $assessmentId;
    private DateTimeImmutable $timestamp;

    /**
     * @param EventType $eventType
     * @param int $assessmentId
     * @param DateTimeImmutable $timestamp
     * @throws Exception
    */
    public function __construct(
        EventType $eventType,
        int $assessmentId,
        DateTimeImmutable $timestamp
    ) {
        try {
            $this->id = uniqid('log_', true);
            $this->eventType = $eventType;
            $this->assessmentId = $assessmentId;
            $this->timestamp = new DateTimeImmutable();
        } catch (Exception $e) {
            throw new RuntimeException('Error creating AssessmentLog: ' . $e->getMessage(), 0, $e);
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

    public function getTimestamp(): ?DateTimeImmutable
    {
        return $this->timestamp;
    }

    /**
     * @param DateTimeImmutable $timestamp
     */
    public function setTimestamp(DateTimeImmutable $timestamp): void
    {
        $this->timestamp = $timestamp;
    }
}