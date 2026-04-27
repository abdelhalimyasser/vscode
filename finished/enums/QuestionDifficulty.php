<?php

declare(strict_types=1);

namespace enums;

enum QuestionDifficulty: string
{
    case HARD = 'HARD';
    case MEDIUM = 'MEDIUM';
    case BASIC = 'BASIC';
}