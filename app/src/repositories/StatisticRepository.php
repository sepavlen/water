<?php


namespace App\src\repositories;


use App\src\entities\Machine;
use App\src\entities\Order;
use App\src\services\OrderService;
use Carbon\Carbon;

class StatisticRepository
{
    public $order;
    
    public function __construct (OrderService $orderService)
    {
        $this->order = $orderService->getModel();
    }
    
    public function getSumOrdersForLastThirtyDays ($user_id)
    {
        return $this->order->whereHas('machine', function ($query) use($user_id){
            if (!isAdmin())
                return $query->where('user_id', $user_id);
        })
            ->where(
            'created_at',
            '>',
            Carbon::now()->subDays(30))
            ->selectRaw("sum(put_amount) as total, date_format(created_at, '%m-%d') as cnt_date")
            ->groupBy('cnt_date')
            ->orderBy('cnt_date')
            ->get()
            ->keyBy('cnt_date')
            ->toArray();
    }

    public function getTotalProfitToday ($user_id)
    {
        return $this->order->whereHas('machine', function ($query) use($user_id){
            if (!isAdmin())
            return $query->where('user_id', $user_id);
        })->where(
                'orders.created_at',
                '>=',
                Carbon::today())
            ->sum('put_amount');
    }

    public function getTotalProfitMonth ($user_id)
    {
        return $this->order->whereHas('machine', function ($query) use($user_id){
            if (!isAdmin())
            return $query->where('user_id', $user_id);
        })
            ->where(
                'orders.created_at',
                '>',
                Carbon::now()->subDays(30))
            ->sum('put_amount');
    }

    public function getTotalProfitYear ($user_id)
    {
        return $this->order->whereHas('machine', function ($query) use($user_id){
            if (!isAdmin())
            return $query->where('user_id', $user_id);
        })
            ->where(
                'orders.created_at',
                '>',
                Carbon::now()->subMonths(12))
            ->sum('put_amount');
    }

    public function getTotalProfitAllTime ($user_id)
    {
        return $this->order->whereHas('machine', function ($query) use($user_id){
            if (!isAdmin())
            return $query->where('user_id', $user_id);
        })->sum('put_amount');
    }

}