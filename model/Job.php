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
class Job
{
    private int $id = 0;
    private ?string $title = null;
    private ?string $department = null;
    private ?string $description = null;
    private ?JobStatus $status = null;
    private array $jobSkills = [];
    private ?\DateTimeImmutable $createdAt = null;

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

    public function getTitle(): ?string
    {
        return $this->title;
    }

    /**
     * @param string $title
     */
    public function setTitle(string $title): void
    {
        $this->title = $title;
    }

    public function getDepartment(): ?string
    {
        return $this->department;
    }

    /**
     * @param string $department
     */
    public function setDepartment(string $department): void
    {
        $this->department = $department;
    }

    public function getDescription(): ?string
    {
        return $this->description;
    }

    /**
     * @param string $description
     */
    public function setDescription(string $description): void
    {
        $this->description = $description;
    }

    public function getStatus(): ?JobStatus
    {
        return $this->status;
    }

    /**
     * @param JobStatus $status
     */
    public function setStatus(JobStatus $status): void
    {
        $this->status = $status;
    }

    public function getJobSkills(): array
    {
        return $this->jobSkills;
    }

    /**
     * @param array $jobSkills
     */
    public function setJobSkills(array $jobSkills): void
    {
        $this->jobSkills = $jobSkills;
    }

    public function getCreatedAt(): ?\DateTimeImmutable
    {
        return $this->createdAt;
    }

    /**
     * @param DateTimeImmutable $createdAt
     */
    public function setCreatedAt(\DateTimeImmutable $createdAt): void
    {
        $this->createdAt = $createdAt;
    }
}