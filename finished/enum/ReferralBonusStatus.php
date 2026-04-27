<?php

declare(strict_types=1);

namespace enum;

enum ReferralBonusStatus: string
{
    case ADDED = 'ADDED';
    case PENDING = 'PENDING';
    case REJECTED = 'REJECTED';
}