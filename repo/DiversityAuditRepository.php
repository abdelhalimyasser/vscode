<?php

declare(strict_types=1);

namespace App\Model;

class DiversityAuditRepository
{
    /**
     * @param DiversityAudit $diversityAudit
     */
    public function submitDiversityAudit(DiversityAudit $diversityAudit): void
    {
        throw new \BadMethodCallException('Not implemented.');
    }

    public function readAllDiversityAudits(): void
    {
        throw new \BadMethodCallException('Not implemented.');
    }

    public function readFirstDiversityAudit(): void
    {
        throw new \BadMethodCallException('Not implemented.');
    }

    public function readLastDiversityAudit(): void
    {
        throw new \BadMethodCallException('Not implemented.');
    }
}