<?php

declare(strict_types=1);

namespace App\Model;

class JobRepository
{
    /**
     * @param Job $job
     */
    public function addJob(Job $job): void
    {
        throw new \BadMethodCallException('Not implemented.');
    }

    /**
     * @param Job $job
     */
    public function updateJob(Job $job): void
    {
        throw new \BadMethodCallException('Not implemented.');
    }

    public function getJobById(): void
    {
        throw new \BadMethodCallException('Not implemented.');
    }

    public function getAllJobs(): void
    {
        throw new \BadMethodCallException('Not implemented.');
    }

    public function getDraftJob(): void
    {
        throw new \BadMethodCallException('Not implemented.');
    }

    public function getApprovelJob(): void
    {
        throw new \BadMethodCallException('Not implemented.');
    }

    public function getAllActiveJob(): void
    {
        throw new \BadMethodCallException('Not implemented.');
    }

    public function getAllCLosedJob(): void
    {
        throw new \BadMethodCallException('Not implemented.');
    }

    public function getAllArchivedJob(): void
    {
        throw new \BadMethodCallException('Not implemented.');
    }

    /**
     * @param \DateTimeImmutable $date
     */
    public function getJobByDate(\DateTimeImmutable $date): void
    {
        throw new \BadMethodCallException('Not implemented.');
    }

    /**
     * @param array $skills
     */
    public function getJobBySkills(array $skills): void
    {
        throw new \BadMethodCallException('Not implemented.');
    }

    /**
     * @param string $name
     */
    public function getJobByName(string $name): void
    {
        throw new \BadMethodCallException('Not implemented.');
    }

    public function deleteJobByID(): void
    {
        throw new \BadMethodCallException('Not implemented.');
    }

    public function deleteJobByName(): void
    {
        throw new \BadMethodCallException('Not implemented.');
    }
}