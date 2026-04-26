<?php

declare(strict_types=1);

namespace App\Model;

use App\Model\Enums\CounterOfferStatus;

class CounterOfferTrackerRepository
{
    /**
     * @param CounterOfferTracker $tracker
     */
    public function saveCounterOffer(CounterOfferTracker $tracker): int
    {
        throw new \BadMethodCallException('Not implemented.');
    }

    /**
     * @param int $offerId
     */
    public function getByOfferId(int $offerId): CounterOfferTracker
    {
        throw new \BadMethodCallException('Not implemented.');
    }

    /**
     * @param int $id
     * @param CounterOfferStatus $status
     */
    public function updateStatus(int $id, CounterOfferStatus $status): bool
    {
        throw new \BadMethodCallException('Not implemented.');
    }
}