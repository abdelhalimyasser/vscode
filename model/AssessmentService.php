<?php

declare(strict_types=1);

namespace App\Model;

use App\Model\Enums\EventType;

class AssessmentService
{
    /**
     * @param int $assessmentId
     * @param string $code
     */
    public function submitCode(int $assessmentId, string $code): void
    {
        throw new \BadMethodCallException('Not implemented.');
    }

    /**
     * @param int $assessmentId
     */
    public function evaluatePlagiarism(int $assessmentId): void
    {
        throw new \BadMethodCallException('Not implemented.');
    }

    /**
     * @param int $assessmentId
     * @param EventType $eventType
     */
    public function logSuspiciousActivity(int $assessmentId, EventType $eventType): void
    {
        throw new \BadMethodCallException('Not implemented.');
    }
}