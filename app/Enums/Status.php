<?php

namespace App\Enums;

use App\Interfaces\IEnum;

enum Status: int implements IEnum
{
    use BaseEnumTrait;

    case PUBLISHED = 1;
    case INACTIVATED = 2;
    case DRAFTED = 3;
    case ARCHIVED = 4;
    case LOCKED = 6;

    public static function getPrefix(): string
    {
        return 'base::modules.enums.status.';
    }
}
