<?php declare(strict_types=1);

namespace App\Enums\User;

use BenSampo\Enum\Enum;

final class UserRoleEnum extends Enum
{
    public const SUPER_ADMIN = 0;
    public const ADMIN = 1;
    public const MEMBER = 2;
    public const EX_MEMBER = 3;

    public static function getArrayView(): array
    {
        return [
            'Super admin'  => self::SUPER_ADMIN,
            'Admin'  => self::ADMIN,
            'Thành viên' => self::MEMBER,
            'Thành viên cũ' => self::EX_MEMBER,
        ];
    }

    public static function getKeyByValue($value): string
    {
        return array_search($value, self::getArrayView(), true);
    }
}
