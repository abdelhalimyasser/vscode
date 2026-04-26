<?php

declare(strict_types=1);

namespace App\Model;

class CandidateSentimentRepository
{
    /**
     * @param CandidateSentiment $sentiment
     * @param Candidate $candidate
     * @param Interview $interview
     */
    public function addSentiment(CandidateSentiment $sentiment, Candidate $candidate, Interview $interview): void
    {
        throw new \BadMethodCallException('Not implemented.');
    }

    public function readAllSentiments(): void
    {
        throw new \BadMethodCallException('Not implemented.');
    }

    public function readFirstSentiment(): void
    {
        throw new \BadMethodCallException('Not implemented.');
    }

    public function readLastSentiment(): void
    {
        throw new \BadMethodCallException('Not implemented.');
    }
}