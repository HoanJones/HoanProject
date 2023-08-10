<?php

use App\Enums\User\UserRoleEnum;

if (!function_exists('getUserRoleByKey')) {
    function getUserRoleByKey($key): string
    {
        return UserRoleEnum::getKeyByValue($key);
    }
}
if (!function_exists('reformatDateToDMY')) {
    function reformatDateToDMY($date): string
    {
        return date("d-m-Y", strtotime($date));
    }
}
