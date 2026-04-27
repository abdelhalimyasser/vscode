<?php

declare(strict_types=1);

namespace App\Model;

use models\InterviewParticipant;

/**
 * Class
 *
 *
 * @package model
 * @author
 * @version 1.0
 * @since 27-04-2026
*/
class HrAdmimService extends InterviewParticipant
{
    public function addJob(): void
    {
        throw new \BadMethodCallException('Not implemented.');
    }

    public function attendInterview(): void
    {
        throw new \BadMethodCallException('Not implemented.');
    }

    public function submitCandidateFeedback(): void
    {
        throw new \BadMethodCallException('Not implemented.');
    }

    public function giveOffer(): void
    {
        throw new \BadMethodCallException('Not implemented.');
    }
}