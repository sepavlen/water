<?php


namespace App\src\helpers;


class RequestHelper
{
    public static function getRequestDate ()
    {
        $return = [];
        if (request('date')){
            $date = explode('-', request('date'));
            $date[0] = date('Y-m-d', strtotime($date[0]));
            $date[1] = date('Y-m-d', strtotime($date[1]));
        }
        $return[0] = $date[0] ?? false;
        $return[1] = $date[1] ?? false;
        return $return;
    }
}