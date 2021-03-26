<?php


namespace App\src\helpers;


use App\src\entities\Machine;
use DateTime;

class MachineHelper
{
    const ADDING_MINUTES_FOR_CHECK = 5;

    public static function getStatus ($key)
    {
        $statuses = [
            Machine::STATUS_ACTIVE => '<span class="label label-sm label-success">Активный</span>',
            Machine::STATUS_BLOCKED => '<span class="label label-sm label-danger">Заблокирован</span>',
            Machine::STATUS_NEW => '<span class="label label-sm label-new">Новый</span>',
        ];
        return $statuses[$key];
    }

    public static function getStatusForTable (Machine $machine)
    {
        if (self::checkProblems($machine)){
            return '<span class="label label-sm label-warning">Есть проблемы</span>';
        }
        return '<span class="label label-sm label-success">Активный</span>';
    }

    public static function getProblems (Machine $machine)
    {
        $return = [];
        $start_date = new DateTime($machine->contact_time);
        $since_start = $start_date->diff(new DateTime());
        if (!self::getMinutesNotTiming($since_start) || self::getMinutesNotTiming($since_start) > ($machine->timing_connect + self::ADDING_MINUTES_FOR_CHECK)){
            $return[] = '<br><span class="text text-danger">Автомат не выходит на связь (com=1) - ' . self::getDiffDate($since_start) . '</span>';
        }

        if ($error = \App\src\helpers\ErrorHelper::getErrors($machine->unique_number)){
            foreach ($error as $err){
                if (is_array($err)){
                    foreach ($err as $item) {
                        $return[] = '<br><span class="text text-danger">' . $item . '</span>';
                    }
                } else {
                    $return[] = '<br><span class="text text-danger">' . $err . '</span>';

                }
            }
        }

        if ($return){
            return $return;
        }
        $return[] = '<span class="text text-info">Проблем нет</span>';
        return $return;
    }

    public static function checkProblems (Machine $machine)
    {
        $start_date = new DateTime($machine->contact_time);
        $since_start = $start_date->diff(new DateTime());
        if (!self::getMinutesNotTiming($since_start) || self::getMinutesNotTiming($since_start) > ($machine->timing_connect + self::ADDING_MINUTES_FOR_CHECK)){
            return true;
        }
        if (session()->has('machine_errors.request_error.'.$machine->unique_number)){
            return true;
        }
        if (session()->has('machine_errors.empty_water.'.$machine->unique_number)){
            return true;
        }
        if (session()->has('machine_errors.order_error.'.$machine->unique_number)){
            return true;
        }
        return false;
    }

    public static function getDiffDate ($date)
    {
        $str = '';
        if ($date->y){
            $str .= $date->y . '(годы) ';
        }
        if ($date->m){
            $str .= $date->m . '(месяцы) ';
        }
        if ($date->d){
            $str .= $date->d . '(дни) ';
        }
        if ($date->h){
            $str .= $date->h . '(часы) ';
        }
        if ($date->i){
            $str .= $date->i . '(минуты) ';
        }
        return $str;
    }

    public static function getMinutesNotTiming ($date)
    {
        $i = 0;
        if ($date->y){
            $i += $date->y * 12 * 30 * 24 * 60;
        }
        if ($date->m){
            $i += $date->m * 30 * 24 * 60;
        }
        if ($date->d){
            $i += $date->d * 24 * 60;
        }
        if ($date->h){
            $i += $date->h * 60;
        }
        if ($date->i){
            $i += $date->i;
        }
        return $i ?: 1;
    }
}