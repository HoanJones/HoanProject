<?php declare(strict_types=1);

namespace App\Enums\User;

use BenSampo\Enum\Enum;


final class InstrumentStatusEnum extends Enum
{
    public const UNAVAILABLE = 0;
    public const AVAILABLE = 1;
    public const PENDING = 2;

    public static function getArrayView(): array
    {
        return [
            'Đã được mượn'  => self::UNAVAILABLE,
            'Còn hàng'  => self::AVAILABLE,
            'Đang xử lý'  => self::PENDING,
        ];
    }

    public static function getKeyByValue($value)
    {
        return array_search($value, self::getArrayView(), true);
    }
}
