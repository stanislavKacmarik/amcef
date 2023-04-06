<?php

namespace App;

enum TodoStatusEnum: string
{
    case Pending = 'pending';
    case Done = 'done';

    public static function values(): array
    {
        return array_column(self::cases(), 'name', 'value');
    }
}