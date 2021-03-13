<?php


namespace App\src\helpers;


use App\src\entities\Machine;
use App\User;

class MachineHelper
{
    public static function getStatus ($key)
    {
        $roles = [
            Machine::STATUS_ACTIVE => '<span class="label label-sm label-success">Активный</span>',
            Machine::STATUS_BLOCKED => '<span class="label label-sm label-danger">Заблокирован</span>',
        ];
        return $roles[$key];
    }
}