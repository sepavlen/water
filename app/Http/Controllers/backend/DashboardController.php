<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
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
