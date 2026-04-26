<?php

declare(strict_types=1);

namespace App\Model;

class InterviewRepository
{
    /**
     * @param Candidate $candidate
     */
    public function attendCandidate(Candidate $candidate): void
    {
        throw new \BadMethodCallException('Not implemented.');
    }

    /**
     * @param Employee $participant
     */
    public function attendInterviewer(Employee $participant): void
    {
        throw new \BadMethodCallException('Not implemented.');
    }
}