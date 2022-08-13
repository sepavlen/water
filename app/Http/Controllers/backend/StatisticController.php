<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use App\src\helpers\RequestHelper;
use App\src\helpers\StatisticHelper;
use App\src\services\MachineService;
use App\src\services\StatisticService;
use Carbon\Carbon;

class StatisticController extends Controller
{
    public $statisticService;
    public $machineService;

    public function __construct(StatisticService $statisticService, MachineService $machineService)
    {
        $this->statisticService = $statisticService;
        $this->machineService = $machineService;
    }

    public function index () 
    {
        if (isDriver()){
            abort(403, "У Вас нет прав для просмотра данной страницы!");
        }
        $machines = $this->machineService->getMachines();
        $statisticCurrentDay = $this->statisticService->getStatisticForCurrentDay();
        $statisticCurrentMonth = $this->statisticService->getStatisticForCurrentMonth();
        $statisticLastMonth = $this->statisticService->getStatisticForLastMonth();


        $dataRequestForChart = StatisticHelper::convertDataForChart(
            $this->statisticService->getStatisticBetweenDates(
                 RequestHelper::getRequestDate()[0],
                RequestHelper::getRequestDate()[1],
                request('machine') ?: false
            )
        );

        return view('backend.statistic.index', [
            'labelsStatisticCurrentDay' => json_encode(array_keys($statisticCurrentDay)),
            'dataStatisticCurrentDay' => json_encode(array_values($statisticCurrentDay)),

            'labelsStatisticCurrentMonth' => json_encode(array_keys($statisticCurrentMonth)),
            'dataStatisticCurrentMonth' => json_encode(array_values($statisticCurrentMonth)),

            'labelsStatisticLastMonth' => json_encode(array_keys($statisticLastMonth)),
            'dataStatisticLastMonth' => json_encode(array_values($statisticLastMonth)),

            'machines' => $machines,

            'dataStatisticHalfYear' => json_encode(StatisticHelper::convertArrayForChart($this->statisticService->getStatisticForPeriod(6))),
            'dataStatisticLastYear' => json_encode(StatisticHelper::convertArrayForChart($this->statisticService->getStatisticForPeriod(12))),
            'dataStatisticAllTime' => json_encode(StatisticHelper::convertArrayForChart($this->statisticService->getStatisticForAllTime())),
            'dataRequestForChart' => json_encode($dataRequestForChart),
        ]);
    }
}
