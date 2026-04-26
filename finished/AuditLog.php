<?php

declare(strict_types=1);

namespace model;

use DateTimeImmutable;
use Exception;
use http\Exception\RuntimeException;

/**
 * Class AuditLog
 *
 * Represents an audit log entry in the system, which records actions performed on database records.
 * It contains information about the action, the table name, the record ID, the old and new values, the user who performed the action,
 * and the timestamp of when the action was performed.
 *
 * @package model
 * @author Abdelhalim Yasser
 * @version 1.0
 * @since 26-04-2026
 */
class AuditLog
{
    private string $id;
    private string $action;
    private string $tableName;
    private int $recordId;
    private string $oldValue;
    private string $newValue;
    private int $performedBy;
    private DateTimeImmutable $createdAt;

    public function __construct(
        string $id,
        string $action,
        string $tableName,
        int $recordId,
        string $oldValue,
        string $newValue,
        int $performedBy,
        DateTimeImmutable $createdAt
        )
    {
        try {
            $this->id = uniqid('auditLog_', true);
            $this->action = $action;
            $this->tableName = $tableName;
            $this->recordId = $recordId;
            $this->oldValue = $oldValue;
            $this->newValue = $newValue;
            $this->performedBy = $performedBy;
            $this->createdAt = new DateTimeImmutable();
        } catch(Exception $e) {
            throw new RuntimeException('Failed to create User: ' . $e->getMessage(), 0, $e);
        }
    }

    public function getId(): string
    {
        return $this->id;
    }

    /**
     * @param string $id
     */
    public function setId(string $id): string
    {
        $this->id = $id;
    }

    public function getAction(): string
    {
        return $this->action;
    }

    /**
     * @param string $action
     */
    public function setAction(string $action): void
    {
        $this->action = $action;
    }

    public function getTableName(): string
    {
        return $this->tableName;
    }

    /**
     * @param string $tableName
     */
    public function setTableName(string $tableName): void
    {
        $this->tableName = $tableName;
    }

    public function getRecordId(): int
    {
        return $this->recordId;
    }

    /**
     * @param int $recordId
     */
    public function setRecordId(int $recordId): void
    {
        $this->recordId = $recordId;
    }

    public function getOldValue(): string
    {
        return $this->oldValue;
    }

    /**
     * @param string $oldValue
     */
    public function setOldValue(string $oldValue): void
    {
        $this->oldValue = $oldValue;
    }

    public function getNewValue(): ?string
    {
        return $this->newValue;
    }

    /**
     * @param string $newValue
     */
    public function setNewValue(string $newValue): void
    {
        $this->newValue = $newValue;
    }

    public function getPerformedBy(): int
    {
        return $this->performedBy;
    }

    /**
     * @param int $performedBy
     */
    public function setPerformedBy(int $performedBy): void
    {
        $this->performedBy = $performedBy;
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
}