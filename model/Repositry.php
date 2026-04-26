<?php

declare(strict_types=1);

namespace App\Model;

class Repositry
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
}