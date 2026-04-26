<?php

declare(strict_types=1);

namespace App\Model;

use App\Model\Enums\CounterOfferStatus;

class CounterOfferService
{
    /**
     * @param int $offerId
     * @param mixed $requestedSalary
     * @param string $notes
     */
    public function submitCounterOffer(int $offerId, mixed $requestedSalary, string $notes): void
    {
        throw new \BadMethodCallException('Not implemented.');
    }

    /**
     * @param int $trackerId
     * @param CounterOfferStatus $decision
     */
    public function reviewCounterOffer(int $trackerId, CounterOfferStatus $decision): void
    {
        throw new \BadMethodCallException('Not implemented.');
    }
}