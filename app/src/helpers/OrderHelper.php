<?php


namespace App\src\helpers;


class OrderHelper
{
    public static function getOrderStatisticArray ($machines, $order_month, $order_yesterday, $order_today)
    {
        $return = [];
        foreach ($machines as $machine) {
            $return[] = [
                'unique_number' => $machine->unique_number,
                'address' => $machine->address,
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
}