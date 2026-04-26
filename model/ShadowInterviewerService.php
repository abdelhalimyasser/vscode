<?php

declare(strict_types=1);

namespace App\Model;

class ShadowInterviewerService extends InterviewParticipant
{
    public function attendInterview(): void
    {
        throw new \BadMethodCallException('Not implemented.');
    }

    public function submitCandidateFeedback(): void
    {
        throw new \BadMethodCallException('Not implemented.');
    }
}