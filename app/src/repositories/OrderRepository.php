<?php


namespace App\src\repositories;


use App\src\entities\Machine;
use App\src\entities\Order;
use App\User;
use Illuminate\Http\Request;

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

    public function getAllOrders ()
    {
        return $this->getOrder()->all();
    }



    public function save (Order $order)
    {
        $order->save();
        return $order;
    }

}