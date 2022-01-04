<?php


namespace App\src\repositories;

use App\src\entities\Order;
use Carbon\Carbon;

class OrderRepository
{
    public function getOrder ()
    {
        return new Order();
    }

    public function getOrderByParams ($params)
    {
        return $this->getOrder()->where($params)->first();
    }

    public function getLastOrderByUniqueNumber ($unique_number) : Order
    {
        return $this->getOrder()->where('machine_unique_number', $unique_number)->get()->last();
    }

    public function getAllOrders ()
    {
        return $this->getOrder()->all();
    }

    public function getSumOrdersForLastMonth ()
    {
        return $this->getOrder()->where(
            'created_at',
            '>',
            Carbon::now()
                ->subDays(30))
            ->selectRaw('machine_id, sum(put_amount) as total, sum(water_given) as water_given')
            ->groupBy('machine_id')
            ->get()
            ->keyBy('machine_id')
            ->toArray();
    }

    public function getSumOrdersForYesterday ()
    {
        return $this->getOrder()->where(
            'created_at',
            '>',
            Carbon::yesterday())
            ->where('created_at',
                '<',
                Carbon::today())
            ->selectRaw('machine_id, sum(put_amount) as total, sum(water_given) as water_given')
            ->groupBy('machine_id')
            ->get()
            ->keyBy('machine_id')
            ->toArray();
    }

    public function getSumOrdersToday ()
    {
        return $this->getOrder()->where(
            'created_at',
            '>',
            Carbon::today())
            ->selectRaw('machine_id, sum(put_amount) as total, sum(water_given) as water_given')
            ->groupBy('machine_id')
            ->get()
            ->keyBy('machine_id')
            ->toArray();
    }

    public function save (Order $order)
    {
        $order->save();
        return $order;
    }

}