<?php


namespace App\src\helpers;


use App\User;
use Illuminate\Support\Facades\Auth;

class UserHelper
{
    public static function getRole ($key)
    {
        return self::getRoles()[$key] ?? 'Роль неизвестна';
    }
    public static function getRoles ()
    {
        return [
            User::ROLE_ADMIN => 'Админ',
            User::ROLE_MANAGER => 'Менеджер',
            User::ROLE_PARTNER => 'Партнер',
            User::ROLE_GENERAL_PARTNER => 'Главный партнер',
            User::ROLE_DRIVER => 'Водитель',
        ];
    }


    public static function getStatus ($key)
    {
        $roles = [
            User::STATUS_ACTIVE => '<span class="label label-sm label-success">Активный</span>',
            User::STATUS_BLOCKED => '<span class="label label-sm label-danger">Заблокирован</span>',
        ];
        return $roles[$key];
    }

    public static function convertForSelect ($users)
    {
        $array = [];
        if ($users) {
            if (isAdmin()){
                foreach ($users as $user) {
                    $array[$user['id']] = $user['email'] . " ({$user['name']})";
                }
            } else {
                $array[Auth::id()] = Auth::user()->email . " (" . Auth::user()->name . ")";
            }
        }
        return $array;
    }
}