<?php

declare(strict_types=1);

namespace model;

use DateTimeImmutable;
use Exception;
use RuntimeException;
use enum\JobStatus;
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
class Job
{
    private string $id;
    private string $title;
    private string $department;
    private string $description;
    private JobStatus $status;
    private array $jobSkills = [];
    private DateTimeImmutable $createdAt;

    /**
     * @param string $title
     * @param string $department
     * @param string $description
     * @param JobStatus $status
     * @param array $jobSkills
     * @param DateTimeImmutable $createdAt
     * @throws Exception
    */
    public function __construct(
        string $title,
        string $department,
        string $description,
        JobStatus $status,
        array $jobSkills,
        DateTimeImmutable $createdAt
    ) {
        try {
            $this->id = uniqid('job_', true);
            $this->title = $title;
            $this->department = $department;
            $this->description = $description;
            $this->status = $status;
            $this->jobSkills = $jobSkills;
            $this->createdAt = new DateTimeImmutable();
        } catch (Exception $e) {
            throw new RuntimeException('Error creating job: ' . $e->getMessage(), 0, $e);
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

    public function getTitle(): string
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

    public function getDepartment(): string
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

    public function getDescription(): string
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

    public function getStatus(): JobStatus
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