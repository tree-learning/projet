<?php

namespace App\Entity\Enum;

enum Confirmed: string
{
    case PENDING = 'pending';
    case CONFIRMED = 'confirmed';
    case CANCELLED = 'cancelled';
}
