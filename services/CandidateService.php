<?php

declare(strict_types=1);

namespace App\Model;

use App\Model\Enums\EventType;

class CandidateService
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
     * @param DiversityAudit $diversityAudit
     */
    public function submitDiversityAudit(DiversityAudit $diversityAudit): void
    {
        throw new \BadMethodCallException('Not implemented.');
    }

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
     * @param CandidateSentiment $sentiment
     * @param Candidate $candidate
     * @param Interview $interview
     */
    public function addSentiment(CandidateSentiment $sentiment, Candidate $candidate, Interview $interview): void
    {
        throw new \BadMethodCallException('Not implemented.');
    }
}