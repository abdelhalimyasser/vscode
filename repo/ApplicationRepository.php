<?php

declare(strict_types=1);

namespace App\Model;

use App\Model\Enums\ApplicationsStatus;
use App\Model\Enums\ReferralBonusStatus;

class ApplicationRepository
{
    /**
     * @param array $applicationData
     */
    public function saveApplication(array $applicationData): int
    {
        throw new \BadMethodCallException('Not implemented.');
    }

    /**
     * @param int $id
     */
    public function getApplicationById(int $id): Application
    {
        throw new \BadMethodCallException('Not implemented.');
    }

    /**
     * @param int $jobId
     */
    public function getApplicationsByJobId(int $jobId): array
    {
        throw new \BadMethodCallException('Not implemented.');
    }

    /**
     * @param int $id
     * @param ApplicationsStatus $status
     */
    public function updateStatus(int $id, ApplicationsStatus $status): bool
    {
        throw new \BadMethodCallException('Not implemented.');
    }

    /**
     * @param int $id
     * @param int $score
     */
    public function updateMatchScore(int $id, int $score): bool
    {
        throw new \BadMethodCallException('Not implemented.');
    }

    /**
     * @param int $id
     * @param ReferralBonusStatus $status
     */
    public function updateReferralStatus(int $id, ReferralBonusStatus $status): bool
    {
        throw new \BadMethodCallException('Not implemented.');
    }
}