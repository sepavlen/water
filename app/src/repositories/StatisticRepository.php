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
    
    public function getSumOrdersForLastThirtyDays ()
    {
        return $this->order->where(
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

}