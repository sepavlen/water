<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use App\src\entities\Order;
use App\src\helpers\OrderHelper;
use App\src\helpers\StatisticHelper;
use App\src\services\StatisticService;
use Carbon\Carbon;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public $statisticService;

    public function __construct(StatisticService $statisticService)
    {
        $this->statisticService = $statisticService;
    }

    public function index ()
    {
        $statistic = $this->statisticService->getStatisticLastThirtyDays();
        return view('backend.dashboard', [
            'labelsForChart' => json_encode(array_keys($statistic)),
            'dataForChart' => json_encode(array_values($statistic)),
            'profit_today' => $this->statisticService->getProfitToday(),
            'daily_income_week_ago' => $this->statisticService->getProfitDailyIncomeWeekAgo(),
            'profit_week' => $this->statisticService->getProfitWeek(),
            'profit_week_ago' => $this->statisticService->getProfitWeekAgo(),
            'count_orders_today' => $this->statisticService->getCountOrdersToday(),
            'daily_count_orders_week_ago' => $this->statisticService->getDailyCountOrdersWeekAgo(),
            'profit_month' => $this->statisticService->getTotalProfitMonth(),
            'profit_month_ago' => $this->statisticService->getProfitMonthAgo(),
        ]);
    }

    public function errors ()
    {
        return view('backend.dashboard.unknown-errors');
    }

    // ajax remove
    public function errorRemove (Request $request)
    {
        if (session('unknown_errors.'.$request->id)){
            session()->forget('unknown_errors.'.$request->id);
        }
    }
}
