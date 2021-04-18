<?php


namespace App\src\helpers;


class StatisticHelper
{
    public static function getDefaultDateLastThirtyDays ()
    {
        $days = array();
        for($i = 30; $i >= 0; $i--)
            $days[] = date("m-d", strtotime('-'. $i .' days'));
        return $days;
    }
    public static function getDefaultHours ()
    {
        $hours = array();
        for($i = 0; $i <= date("H", time()); $i++){
            $hours[] = date("H:00", strtotime('-'. $i .' hours'));
        }
        return array_reverse($hours);
    }
    public static function getDefaultDateCurrentMonth ()
    {
        $days = array();
        for($i = 0; $i < date("d", time()); $i++){
            $days[] = date("m-d", strtotime('-'. $i .' days'));
        }
        return array_reverse($days);
    }
    public static function getDefaultDateLastMonth ()
    {
        $days = array();
        for($i = 1; $i <= date("d", strtotime('last day of previous month')); $i++){
            $days[] = date("m-d", mktime(0, 0, 0, date('m', strtotime('last day of previous month')), $i));
        }
        return $days;
    }
    public static function getDefaultDatePeriod ($month)
    {
        $days = array();
        for($i = 1; $i <= $month; $i++){
            if ($i === 1)
                $days[] = date("Y F", now()->timestamp);
            elseif ($i == $month)
                continue;
            $days[] = date("Y F", now()->startOfMonth()->subMonths($i)->timestamp);
        }
        return $days;
    }

    public static function getStatisticForLastThirtyDays ($sum_orders)
    {
        $return = [];
        foreach (self::getDefaultDateLastThirtyDays() as $date){
            $return[$date] = isset($sum_orders[$date]) ? (float)$sum_orders[$date]['total'] : 0;
        }
        return $return;
    }

    public static function getStatisticForCurrentDay ($sum_orders)
    {
        $return = [];
        foreach (self::getDefaultHours() as $date){
            $return[$date] = isset($sum_orders[$date]) ? (float)$sum_orders[$date]['total'] : 0;
        }
        return $return;
    }

    public static function getStatisticForCurrentMonth ($sum_orders)
    {
        $return = [];
        foreach (self::getDefaultDateCurrentMonth() as $date){
            $return[$date] = isset($sum_orders[$date]) ? (float)$sum_orders[$date]['total'] : 0;
        }
        return $return;
    }

    public static function getStatisticForLastMonth ($sum_orders)
    {
        $return = [];
        foreach (self::getDefaultDateLastMonth() as $date){
            $return[$date] = isset($sum_orders[$date]) ? (float)$sum_orders[$date]['total'] : 0;
        }
        return $return;
    }

    public static function getStatisticForPeriod ($sum_orders, $months)
    {
        $return = [];
        foreach (self::getDefaultDatePeriod($months) as $date){
            $return[$date] = isset($sum_orders[$date]) ? (float)$sum_orders[$date]['total'] : 0;
        }
        return $return;
    }

    public static function convertArrayForChart (array $data) : array
    {
        $array = [];
        foreach (array_reverse($data) as $key => $value){
            if(is_array($value)){
                $array[] = [
                    'name' => reset($value),
                    'y' => (int)end($value),
                ];
            } else {
                $array[] = [
                    'name' => $key,
                    'y' => $value,
                ];
            }

        }
        return $array;
    }
}