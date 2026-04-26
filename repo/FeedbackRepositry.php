<?php

declare(strict_types=1);

namespace App\Model;

class FeedbackRepositry
{
    public function getFirstFeedBack(): void
    {
        throw new \BadMethodCallException('Not implemented.');
    }

    public function getLastFeedback(): void
    {
        throw new \BadMethodCallException('Not implemented.');
    }

    public function getAllFeedback(): void
    {
        throw new \BadMethodCallException('Not implemented.');
    }

    /**
     * @param \DateTimeImmutable $date
     */
    public function getFeedbackByDate(\DateTimeImmutable $date): void
    {
        throw new \BadMethodCallException('Not implemented.');
    }

    /**
     * @param InterviewParticipant $participant
     * @param Feedback $feedbackData
     */
    public function submitFeedback(InterviewParticipant $participant, Feedback $feedbackData): void
    {
        throw new \BadMethodCallException('Not implemented.');
    }
}