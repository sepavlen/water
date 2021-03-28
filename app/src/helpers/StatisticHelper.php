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

    public static function getStatisticForLastThirtyDays ($sum_orders)
    {
        $return = [];
        foreach (self::getDefaultDateLastThirtyDays() as $date){
            $return[$date] = isset($sum_orders[$date]) ? $sum_orders[$date]['total'] : 0;
        }
        return $return;
    }
}