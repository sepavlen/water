<?php


namespace App\src\repositories;


use App\src\services\OrderService;
use App\User;
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
            if (isGeneralPartner()){
                $query->join('users', function ($join) {
                    $join->on('user_id', '=', 'users.id');
                })->whereIn('users.role', [User::ROLE_GENERAL_PARTNER, User::ROLE_PARTNER]);
            }
            if (isDefaultUser())
                $query->where('user_id', $user_id);
            return $query;
        })
            ->where(
            'created_at',
            '>',
            Carbon::today()->subDays(30))
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
            if (isGeneralPartner()){
                $query->join('users', function ($join) {
                    $join->on('user_id', '=', 'users.id');
                })->whereIn('users.role', [User::ROLE_GENERAL_PARTNER, User::ROLE_PARTNER]);
            }
            if (isDefaultUser())
                $query->where('user_id', $user_id);
            return $query;
        })->where(
                'orders.created_at',
                '>=',
                Carbon::today())
            ->sum('put_amount');
    }

    public function getTotalProfitMonth ($user_id)
    {
        return $this->order->whereHas('machine', function ($query) use($user_id){
            if (isGeneralPartner()){
                $query->join('users', function ($join) {
                    $join->on('user_id', '=', 'users.id');
                })->whereIn('users.role', [User::ROLE_GENERAL_PARTNER, User::ROLE_PARTNER]);
            }
            if (isDefaultUser())
                $query->where('user_id', $user_id);
            return $query;
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
            if (isGeneralPartner()){
                $query->join('users', function ($join) {
                    $join->on('user_id', '=', 'users.id');
                })->whereIn('users.role', [User::ROLE_GENERAL_PARTNER, User::ROLE_PARTNER]);
            }
            if (isDefaultUser())
                $query->where('user_id', $user_id);
            return $query;
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
            if (isGeneralPartner()){
                $query->join('users', function ($join) {
                    $join->on('user_id', '=', 'users.id');
                })->whereIn('users.role', [User::ROLE_GENERAL_PARTNER, User::ROLE_PARTNER]);
            }
            if (isDefaultUser())
                $query->where('user_id', $user_id);
            return $query;
        })->sum('put_amount');
    }

    public function getStatisticForCurrentDay ($user_id, $machine_id)
    {
        return $this->order->whereHas('machine', function ($query) use($user_id, $machine_id){
            if (isGeneralPartner()){
                $query->join('users', function ($join) {
                    $join->on('user_id', '=', 'users.id');
                })->whereIn('users.role', [User::ROLE_GENERAL_PARTNER, User::ROLE_PARTNER]);
            }
            if (isDefaultUser())
                $query->where('user_id', $user_id);
            if ($machine_id)
                $query->where('machines.id', $machine_id);
            return $query;
        })
            ->where(
                'created_at',
                '>=',
                Carbon::today())
            ->selectRaw("sum(put_amount) as total, date_format(created_at, '%H:00') as cnt_date")
            ->groupBy('cnt_date')
            ->orderBy('cnt_date')
            ->get()
            ->keyBy('cnt_date')
            ->toArray();
    }

    public function getStatisticForCurrentMonth ($user_id, $machine_id)
    {
        return $this->order->whereHas('machine', function ($query) use($user_id, $machine_id){
            if (isGeneralPartner()){
                $query->join('users', function ($join) {
                    $join->on('user_id', '=', 'users.id');
                })->whereIn('users.role', [User::ROLE_GENERAL_PARTNER, User::ROLE_PARTNER]);
            }
            if (isDefaultUser())
                $query->where('user_id', $user_id);
            if ($machine_id)
                $query->where('machines.id', $machine_id);
            return $query;
        })
            ->where(
                'created_at',
                '>=',
                Carbon::now()->subMonths())
            ->selectRaw("sum(put_amount) as total, date_format(created_at, '%m-%d') as cnt_date")
            ->groupBy('cnt_date')
            ->orderBy('cnt_date')
            ->get()
            ->keyBy('cnt_date')
            ->toArray();
    }

    public function getStatisticForLastMonth ($user_id, $machine_id)
    {
        return $this->order->whereHas('machine', function ($query) use($user_id, $machine_id){
            if (isGeneralPartner()){
                $query->join('users', function ($join) {
                    $join->on('user_id', '=', 'users.id');
                })->whereIn('users.role', [User::ROLE_GENERAL_PARTNER, User::ROLE_PARTNER]);
            }
            if (isDefaultUser())
                $query->where('user_id', $user_id);
            if ($machine_id)
                $query->where('machines.id', $machine_id);
            return $query;
        })
            ->where(
                'created_at',
                '<',
                Carbon::now()->startOfMonth())
            ->where(
                'created_at',
                '>=',
                Carbon::now()->subMonths(2)->endOfMonth())
            ->selectRaw("sum(put_amount) as total, date_format(created_at, '%m-%d') as cnt_date")
            ->groupBy('cnt_date')
            ->orderBy('cnt_date')
            ->get()
            ->keyBy('cnt_date')
            ->toArray();
    }

    public function getStatisticForPeriod ($user_id, $period, $machine_id)
    {
        return $this->order->whereHas('machine', function ($query) use($user_id, $machine_id){
            if (isGeneralPartner()){
                $query->join('users', function ($join) {
                    $join->on('user_id', '=', 'users.id');
                })->whereIn('users.role', [User::ROLE_GENERAL_PARTNER, User::ROLE_PARTNER]);
            }
            if (isDefaultUser())
                $query->where('user_id', $user_id);
            if ($machine_id)
                $query->where('machines.id', $machine_id);
            return $query;
        })
            ->where(
                'created_at',
                '>=',
                Carbon::now()->subMonths($period))
            ->selectRaw("sum(put_amount) as total, date_format(created_at, '%Y %M') as cnt_date")
            ->groupBy('cnt_date')
            ->orderBy('cnt_date')
            ->get()
            ->keyBy('cnt_date')
            ->toArray();
    }

    public function getStatisticBetweenDates ($dateFrom, $dateTo, $machine_ids)
    {
        return $this->order->whereHas('machine', function ($query) use($machine_ids){
            if (isGeneralPartner()){
                $query->join('users', function ($join) {
                    $join->on('user_id', '=', 'users.id');
                })->whereIn('users.role', [User::ROLE_GENERAL_PARTNER, User::ROLE_PARTNER]);
            }
            if (isDefaultUser())
                $query->where('user_id', \Auth::id());
            if ($machine_ids)
                $query->whereIn('machines.id', $machine_ids);
            return $query;
        })

            ->where('created_at', '>=', $dateFrom ?: '1970-01-01')
            ->where('created_at', '<=', $dateTo ? $dateTo . ' 23:59:59' : '2999-01-01')
            ->selectRaw("sum(put_amount) as total, date_format(created_at, '%Y-%m-%d') as cnt_date")
            ->groupBy('cnt_date')
            ->orderBy('cnt_date')
            ->get()
            ->toArray();
    }

    public function getStatisticForAllTime ($user_id, $machine_id)
    {
        return $this->order->whereHas('machine', function ($query) use($user_id, $machine_id){
            if (isGeneralPartner()){
                $query->join('users', function ($join) {
                    $join->on('user_id', '=', 'users.id');
                })->whereIn('users.role', [User::ROLE_GENERAL_PARTNER, User::ROLE_PARTNER]);
            }
            if (isDefaultUser())
                $query->where('user_id', $user_id);
            if ($machine_id)
                $query->where('machines.id', $machine_id);
            return $query;
        })
            ->selectRaw("date_format(created_at, '%Y %M') as cnt_date, date_format(created_at, '%Y %m') as group_date, sum(put_amount) as total")
            ->groupBy('cnt_date', 'group_date')
            ->orderBy('group_date', 'desc')
            ->get()
            ->keyBy('cnt_date')
            ->toArray();
    }

}