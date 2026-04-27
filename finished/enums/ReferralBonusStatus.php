<?php

declare(strict_types=1);

namespace enums;

enum ReferralBonusStatus: string
{
    case ADDED = 'ADDED';
    case PENDING = 'PENDING';
    case REJECTED = 'REJECTED';
}