<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use App\src\entities\Order;
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
        if (\Auth::id() == 4){
            dd(json_encode(array_values($statistic)));
        }

        return view('backend.dashboard', [
            'labelsForChart' => json_encode(array_keys($statistic)),
            'dataForChart' => json_encode(array_values($statistic)),
            'profit_today' => $this->statisticService->getTotalProfitToday(),
            'profit_month' => $this->statisticService->getTotalProfitMonth(),
            'profit_year' => $this->statisticService->getTotalProfitYear(),
            'profit_all_time' => $this->statisticService->getTotalProfitAllTime(),
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
