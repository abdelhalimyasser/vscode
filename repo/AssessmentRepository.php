<?php

declare(strict_types=1);

namespace App\Model;

class AssessmentRepository
{
    /**
     * @param Assessment $assessment
     */
    public function saveAssessment(Assessment $assessment): int
    {
        throw new \BadMethodCallException('Not implemented.');
    }

    /**
     * @param int $id
     */
    public function getAssessmentById(int $id): Assessment
    {
        throw new \BadMethodCallException('Not implemented.');
    }

    /**
     * @param int $id
     * @param string $code
     */
    public function updateCode(int $id, string $code): bool
    {
        throw new \BadMethodCallException('Not implemented.');
    }

    /**
     * @param int $id
     * @param int $score
     */
    public function updatePlagiarismScore(int $id, int $score): bool
    {
        throw new \BadMethodCallException('Not implemented.');
    }

    /**
     * @param int $id
     * @param mixed $status
     */
    public function updateStatus(int $id, mixed $status): bool
    {
        throw new \BadMethodCallException('Not implemented.');
    }
}