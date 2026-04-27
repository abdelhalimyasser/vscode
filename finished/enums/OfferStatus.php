<?php

declare(strict_types=1);

namespace enums;

enum OfferStatus: string
{
    case PENDING = 'PENDING';
    case ACCEPTED = 'ACCEPTED';
    case REJECTED = 'REJECTED';
    case EXPIRED = 'EXPIRED';
    case NEGOTIATING = 'NEGOTIATING';
}