<?php

declare(strict_types=1);

namespace App\Model;

use App\Model\Enums\ApplicationsStatus;

class ApplicationService
{
    /**
     * @param int $candidateId
     * @param int $jobId
     * @param array $resumeData
     */
    public function submitApplication(int $candidateId, int $jobId, array $resumeData): void
    {
        throw new \BadMethodCallException('Not implemented.');
    }

    /**
     * @param int $applicationId
     * @param ApplicationsStatus $newStatus
     */
    public function updateApplicationStatus(int $applicationId, ApplicationsStatus $newStatus): void
    {
        throw new \BadMethodCallException('Not implemented.');
    }

    /**
     * @param User $referral
     * @param User $candidate
     */
    public function referralCandidate(User $referral, User $candidate): void
    {
        throw new \BadMethodCallException('Not implemented.');
    }
}