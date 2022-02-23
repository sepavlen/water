<?php


namespace App\src\repositories;

use App\src\entities\Order;
use App\User;
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

    public function getLastOrderByUniqueNumber ($unique_number) : ?Order
    {
        return $this->getOrder()->where('machine_unique_number', $unique_number)->orderBy('id', 'desc')->first();
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

    public function getPnl ($date, $is_partners = false)
    {
        $query = $this->getOrder()
            ->join('machines', function ($join) {
                $join->on('machine_id', '=', 'machines.id');
            })->join('users', function ($join) {
                $join->on('users.id', '=', 'machines.user_id');
            });
        if ($is_partners){
            $query->where('users.role', User::ROLE_PARTNER);
        } else {
            $query->where('users.id', \Auth::id());
        }
        return $query->whereRaw('date_format(orders.created_at, "%Y-%m") = ?', $date)
            ->selectRaw('machine_id, 
                machine_unique_number,
                machines.lender_price, 
                machines.address, 
                users.name, 
                sum(put_amount) as put_amount, 
                sum(water_paid) as water_paid, 
                sum(sold_amount) as sold_amount'
            )
            ->groupBy('orders.machine_id', 'orders.machine_unique_number')
            ->get();
    }

}