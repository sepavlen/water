<?php


namespace App\src\helpers;


use App\User;

class UserHelper
{
    public static function getRole ($key)
    {
        $roles = [
            User::ROLE_ADMIN => 'Админ',
            User::ROLE_MANAGER => 'Менеджер',
        ];
        return $roles[$key];
    }

    public static function getStatus ($key)
    {
        $roles = [
            User::STATUS_ACTIVE => '<span class="label label-sm label-success">Активный</span>',
            User::STATUS_BLOCKED => '<span class="label label-sm label-danger">Заблокирован</span>',
        ];
        return $roles[$key];
    }
}