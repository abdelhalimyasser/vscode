<?php

declare(strict_types=1);

namespace App\Model;

class AuditLogRepository
{
    /**
     * @param User $user
     * @param int $action
     */
    public function addAction(User $user, int $action): void
    {
        throw new \BadMethodCallException('Not implemented.');
    }

    /**
     * @param User $user
     */
    public function readLogByUser(User $user): void
    {
        throw new \BadMethodCallException('Not implemented.');
    }

    /**
     * @param User $user
     */
    public function readLogByDate(User $user): void
    {
        throw new \BadMethodCallException('Not implemented.');
    }
}