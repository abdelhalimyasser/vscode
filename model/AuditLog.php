<?php

declare(strict_types=1);

namespace App\Model;

class AuditLog
{
    private int $id = 0;
    private ?string $action = null;
    private ?string $tableName = null;
    private int $recordId = 0;
    private ?string $oldValue = null;
    private ?string $newValue = null;
    private int $performedBy = 0;
    private ?\DateTimeImmutable $createdAt = null;

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

    public function getAction(): ?string
    {
        return $this->action;
    }

    /**
     *
     * @param string $action
     */
    public function setAction(string $action): void
    {
        $this->action = $action;
    }

    public function getTableName(): ?string
    {
        return $this->tableName;
    }

    /**
     *
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
     *
     * @param int $recordId
     */
    public function setRecordId(int $recordId): void
    {
        $this->recordId = $recordId;
    }

    public function getOldValue(): ?string
    {
        return $this->oldValue;
    }

    /**
     *
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
     *
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
     *
     * @param int $performedBy
     */
    public function setPerformedBy(int $performedBy): void
    {
        $this->performedBy = $performedBy;
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
}