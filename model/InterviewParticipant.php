<?php

declare(strict_types=1);

namespace model;

use DateTimeImmutable;
use Exception;
use RuntimeException;

/**
 * Class
 *
 *
 * @package model
 * @author
 * @version 1.0
 * @since 27-04-2026
*/
class InterviewParticipant
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