<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use App\src\services\StatisticService;
use Carbon\Carbon;

class StatisticController extends Controller
{
    public $statisticService;

    public function __construct(StatisticService $statisticService)
    {
        $this->statisticService = $statisticService;
    }

    public function index () 
    {
        $statisticCurrentDay = $this->statisticService->getStatisticForCurrentDay();
        $statisticCurrentMonth = $this->statisticService->getStatisticForCurrentMonth();
        $statisticLastMonth = $this->statisticService->getStatisticForLastMonth();
        return view('backend.statistic.index', [
            'labelsStatisticCurrentDay' => json_encode(array_keys($statisticCurrentDay)),
            'dataStatisticCurrentDay' => json_encode(array_values($statisticCurrentDay)),

            'labelsStatisticCurrentMonth' => json_encode(array_keys($statisticCurrentMonth)),
            'dataStatisticCurrentMonth' => json_encode(array_values($statisticCurrentMonth)),

            'labelsStatisticLastMonth' => json_encode(array_keys($statisticLastMonth)),
            'dataStatisticLastMonth' => json_encode(array_values($statisticLastMonth)),
        ]);
    }
}
