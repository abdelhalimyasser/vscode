<?php

declare(strict_types=1);

namespace App\Model;

class NotificationRepository
{
    public function sendNotification(): void
    {
        throw new \BadMethodCallException('Not implemented.');
    }

    public function reciveNotification(): void
    {
        throw new \BadMethodCallException('Not implemented.');
    }

    public function readNotification(): void
    {
        throw new \BadMethodCallException('Not implemented.');
    }

    public function deleteNotification(): void
    {
        throw new \BadMethodCallException('Not implemented.');
    }

    public function getAllNotifications(): void
    {
        throw new \BadMethodCallException('Not implemented.');
    }

    public function getAllUnreadNotification(): void
    {
        throw new \BadMethodCallException('Not implemented.');
    }

    /**
     * @param \DateTimeImmutable $date
     */
    public function getNotificationByData(\DateTimeImmutable $date): void
    {
        throw new \BadMethodCallException('Not implemented.');
    }
}