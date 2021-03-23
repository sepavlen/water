<?php


namespace App\src\helpers;


use App\src\entities\Machine;
use App\User;
use DateTime;

class MachineHelper
{
    public static function getStatus ($key)
    {
        $statuses = [
            Machine::STATUS_ACTIVE => '<span class="label label-sm label-success">Активный</span>',
            Machine::STATUS_BLOCKED => '<span class="label label-sm label-danger">Заблокирован</span>',
            Machine::STATUS_NEW => '<span class="label label-sm label-new">Новый</span>',
        ];
        return $statuses[$key];
    }

    public static function getTimingStatus (Machine $machine)
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
        if ($since_start->i > ($machine->timing_connect + 2)){
            $return[] = '<br><span class="text text-danger">Автомат не выходит на связь ' . self::getDiffDate($since_start) . '</span>';
        }

        if (session()->has('request_error.' . $machine->unique_number)){
            $error = self::getErrorsByNumber(session('request_error.' . $machine->unique_number));
            if ($error){
                $return[] = '<br><span class="text text-danger">' . $error . '</span>';
            } else {
                $return[] = '<br><span class="text text-danger">Ошибка №' . session('request_error.' . $machine->unique_number) . ' </span>';
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
        if ($since_start->i > ($machine->timing_connect + 2)){
            return true;
        }
        if (session()->has('request_error.' . $machine->unique_number)){
            return true;
        }
        return false;
    }

    public static function checkProblemsForLayout ($machines)
    {
        if ($machines){
            foreach($machines as $machine){
                if (self::checkProblems($machine)){
                    return true;
                }
            }
        }
        return false;
    }

    public static function getErrorsByNumber ($errno)
    {
        $error = '';
        switch ($errno){
            case '0x00000001':
                $error = 'Автомат заблокирован';
                break;
            case '0x00000010':
                $error = 'Сенсор открытия двери';
                break;
            case '0x00000020':
                $error = 'Уровень воды по верхний датчик';
                break;
            case '0x00001000':
                $error = 'Бокс монетоприемника открыт';
                break;
            case '0x00002000':
                $error = 'Бокс купюроприемника открыт';
                break;
            case '0x00003000':
                $error = 'Маска инкассации';
                break;
            case '0x00010000':
                $error = 'Уровень воды ниже нижнего датчика';
                break;
            case '0x00020000':
                $error = 'Ошибка монетоприемника';
                break;
            case '0x00040000':
                $error = 'Ошибка купюроприемника';
                break;
            case '0x00080000':
                $error = 'Ошибка насоса';
                break;
            case '0x00100000':
                $error = 'Ошибка счетчика вод';
                break;
            case '0x00200000':
                $error = 'Ошибка клапана';
                break;
        }
        return $error;
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
}