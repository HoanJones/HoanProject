<?php declare(strict_types=1);

namespace App\Enums\User;

use BenSampo\Enum\Enum;

final class UserRoleEnum extends Enum
{
    public const SUPER_ADMIN = 1;
    public const ADMIN = 2;
    public const MEMBER = 3;

    public static function getArrayView(): array
    {
        return [
            'Super admin'  => self::SUPER_ADMIN,
            'Admin'  => self::ADMIN,
            'Thành viên' => self::MEMBER,
        ];
    }

    public static function getKeyByValue($value)
    {
        return array_search($value, self::getArrayView(), true);
    }
}
