<?php declare(strict_types=1);

namespace App\Enums\User;

use BenSampo\Enum\Enum;

final class UserRoleEnum extends Enum
{
    public const SUPER_ADMIN = 0;
    public const ADMIN = 1;
    public const MEMBER = 2;
    public const EX_MEMBER = 3;
}
