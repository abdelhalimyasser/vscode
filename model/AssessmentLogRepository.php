<?php

declare(strict_types=1);

namespace App\Model;

use App\Model\Enums\EventType;

class AssessmentLogRepository
{
    /**
     * @param User $user
     * @param Assessment $assessment
     * @param EventType $event
     * @param int $action
     */
    public function addAction(User $user, Assessment $assessment, EventType $event, int $action): void
    {
        throw new \BadMethodCallException('Not implemented.');
    }

    /**
     * @param User $user
     */
    public function readLogByUser(User $user): void
    {
        throw new \BadMethodCallException('Not implemented.');
    }

    /**
     * @param User $user
     */
    public function readLogByDate(User $user): void
    {
        throw new \BadMethodCallException('Not implemented.');
    }

    /**
     * @param int $assessmentId
     */
    public function generateCheatingReport(int $assessmentId): void
    {
        throw new \BadMethodCallException('Not implemented.');
    }
}