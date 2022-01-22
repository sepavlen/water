<?php


namespace App\src\helpers;


class OrderHelper
{
    public static function getOrderStatisticArray ($machines, $order_month, $order_yesterday, $order_today, $last_water_added)
    {
//        dd($machines[0]);
        $return = [];
        foreach ($machines as $machine) {
            $return[] = [
                'unique_number' => $machine->unique_number,
                'address' => $machine->address,
                'waterAddition' => isset($last_water_added[$machine->id]) ? $last_water_added[$machine->id]->created_at . ' / ' . $last_water_added[$machine->id]->water_given . 'л' : 0,
                'contact_time' => $machine->contact_time,
                'water_amount' => $machine->water_amount,
                'water_given_month' => isset($order_month[$machine->id]) ? $order_month[$machine->id]['water_given'] : 0,
                'water_given_yesterday' => isset($order_yesterday[$machine->id]) ? $order_yesterday[$machine->id]['water_given'] : 0,
                'water_given_today' => isset($order_today[$machine->id]) ? $order_today[$machine->id]['water_given'] : 0,
                'orders_sum_month' => isset($order_month[$machine->id]) ? $order_month[$machine->id]['total'] : 0,
                'orders_sum_yesterday' => isset($order_yesterday[$machine->id]) ? $order_yesterday[$machine->id]['total'] : 0,
                'orders_sum_today' => isset($order_today[$machine->id]) ? $order_today[$machine->id]['total'] : 0,
            ];
        }
        return $return;
    }
    
    public static function displayDiffPercent ($curr_number, $past_number)
    {
        if ($past_number > $curr_number){
            return  self::getDiffPercent($curr_number, $past_number);
        }
        return self::getDiffPercent($past_number, $curr_number);

    }

    public static function getDiffPercent ($num1, $num2)
    {
        if (!$num2){
            return 0;
        }
        return round(100 - ($num1 / $num2 * 100), 1);
    }
}