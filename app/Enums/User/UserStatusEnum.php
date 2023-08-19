<?php declare(strict_types=1);

namespace App\Enums\User;

use BenSampo\Enum\Enum;


final class UserStatusEnum extends Enum
{
    public const INACTIVE = 0;
    public const ACTIVE = 1;

    public static function getArrayView(): array
    {
        return [
            'Hoạt động'  => self::ACTIVE,
            'Ngưng hoạt động'  => self::INACTIVE,
        ];
    }

    public static function getKeyByValue($value)
    {
        return array_search($value, self::getArrayView(), true);
    }
}
