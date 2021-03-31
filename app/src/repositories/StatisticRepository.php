<?php


namespace App\src\repositories;


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
            ->selectRaw("sum(put_amount) as total, to_char(created_at, 'MM-dd') as cnt_date")
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

    public function getStatisticForCurrentDay ($user_id)
    {
        return $this->order->whereHas('machine', function ($query) use($user_id){
            if (!isAdmin())
                return $query->where('user_id', $user_id);
        })
            ->where(
                'created_at',
                '>=',
                Carbon::today())
            ->selectRaw("sum(put_amount) as total, to_char(created_at, 'hh:00') as cnt_date")
            ->groupBy('cnt_date')
            ->orderBy('cnt_date')
            ->get()
            ->keyBy('cnt_date')
            ->toArray();
    }

    public function getStatisticForCurrentMonth ($user_id)
    {
        return $this->order->whereHas('machine', function ($query) use($user_id){
            if (!isAdmin())
                return $query->where('user_id', $user_id);
        })
            ->where(
                'created_at',
                '<=',
                Carbon::now()->subMonths()->endOfMonth())
            ->selectRaw("sum(put_amount) as total, to_char(created_at, 'MM-dd') as cnt_date")
            ->groupBy('cnt_date')
            ->orderBy('cnt_date')
            ->get()
            ->keyBy('cnt_date')
            ->toArray();
    }

    public function getStatisticForLastMonth ($user_id)
    {
        return $this->order->whereHas('machine', function ($query) use($user_id){
            if (!isAdmin())
                return $query->where('user_id', $user_id);
        })
            ->where(
                'created_at',
                '<',
                Carbon::now()->subMonth()->startOfMonth())
            ->where(
                'created_at',
                '>=',
                Carbon::now()->startOfMonth()->subMonths())
            ->selectRaw("sum(put_amount) as total, to_char(created_at, 'MM-dd') as cnt_date")
            ->groupBy('cnt_date')
            ->orderBy('cnt_date')
            ->get()
            ->keyBy('cnt_date')
            ->toArray();
    }

    public function getStatisticForPeriod ($user_id, $period)
    {
        return $this->order->whereHas('machine', function ($query) use($user_id){
            if (!isAdmin())
                return $query->where('user_id', $user_id);
        })
            ->where(
                'created_at',
                '>=',
                Carbon::now()->subMonths($period))
            ->selectRaw("sum(put_amount) as total, to_char(created_at, 'YY MM') as cnt_date")
            ->groupBy('cnt_date')
            ->orderBy('cnt_date')
            ->get()
            ->keyBy('cnt_date')
            ->toArray();
    }
    public function getStatisticForAllTime ($user_id)
    {
        return $this->order->whereHas('machine', function ($query) use($user_id){
            if (!isAdmin())
                return $query->where('user_id', $user_id);
        })
            ->selectRaw("to_char(created_at, 'YY MM') as cnt_date, sum(put_amount) as total")
            ->groupBy('cnt_date')
            ->orderBy('cnt_date', 'desc')
            ->get()
            ->keyBy('cnt_date')
            ->toArray();
    }

}