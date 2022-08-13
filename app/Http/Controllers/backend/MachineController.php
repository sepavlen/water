<?php

namespace App\Http\Controllers\backend;


use App\Http\Controllers\Controller;
use App\src\entities\Machine;
use App\src\helpers\RequestHelper;
use App\src\helpers\StatisticHelper;
use App\src\repositories\ErrorRepository;
use App\src\repositories\WaterAdditionRepository;
use App\src\services\MachineService;
use App\src\services\StatisticService;
use App\src\services\UserService;
use Illuminate\Auth\Access\Response;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;

class MachineController extends Controller
{
    public $service;
    public $userService;
    public $statisticService;

    public function __construct(MachineService $service, StatisticService $statisticService, UserService $userService)
    {
        $this->service = $service;
        $this->userService = $userService;
        $this->statisticService = $statisticService;
    }

    public function machine () 
    {
        if (isDriver()){
            abort(403, "У Вас нет прав для просмотра данной страницы!");
        }
        $machines = $this->service->getMachines();
        return view('backend.machine.machine', compact('machines'));
    }

    public function create ()
    {
        if (Gate::denies('update', new Machine())){
            abort(403, "У Вас нет прав для создания нового автомата!");
        }

        $machine = $this->service->getModel();
        $users = $this->userService->getAllUsers()->toArray();
        return view('backend.machine.create', compact('machine', 'users'));
    }

    public function save (Request $request)
    {
        $this->service->machine_validate($request);
        if ($this->service->save($request)){
            return redirect()->route('dashboard.machine')->with(['success' => "Вы создали новый автомат"]);
        }
        return redirect()->route('dashboard.machine')->with(['errors' => "Не удалось создать автомат!"]);
    }

    public function edit (Machine $machine)
    {
        if (Gate::denies('update', [$machine])){
            abort(403, "У Вас нет прав для редактирования данного автомата!");
        }

        $users = $this->userService->getAllUsers()->toArray();
        return view('backend.machine.create', compact('machine', 'users'));
    }

    public function update (Machine $machine, Request $request)
    {
        if ($this->service->update($machine, $request)){
            return redirect()->route('dashboard.machine')->with(['success' => "Изменения сохранены"]);
        }
        return redirect()->route('dashboard.machine')->with(['errors' => "Не удалось изменить автомат!"]);
    }

    public function showStatistic (Machine $machine)
    {
        if (Gate::denies('view', [$machine])){
            abort(403, "У Вас нет прав для просмотра статистики данного автомата!");
        }

        $dataRequestForChart = StatisticHelper::convertDataForChart(
            $this->statisticService->getStatisticOneMachineBetweenDates(
                RequestHelper::getRequestDate()[0],
                RequestHelper::getRequestDate()[1],
                Auth::id(),
                $machine->id
            )
        );

        $statisticCurrentDay = $this->statisticService->getStatisticForCurrentDay($machine->id);
        $statisticCurrentMonth = $this->statisticService->getStatisticForCurrentMonth($machine->id);
        $statisticLastMonth = $this->statisticService->getStatisticForLastMonth($machine->id);

        return view('backend.machine.show-statistic', [
            'machine' => $machine,
            'labelsStatisticCurrentDay' => json_encode(array_keys($statisticCurrentDay)),
            'dataStatisticCurrentDay' => json_encode(array_values($statisticCurrentDay)),

            'labelsStatisticCurrentMonth' => json_encode(array_keys($statisticCurrentMonth)),
            'dataStatisticCurrentMonth' => json_encode(array_values($statisticCurrentMonth)),

            'labelsStatisticLastMonth' => json_encode(array_keys($statisticLastMonth)),
            'dataStatisticLastMonth' => json_encode(array_values($statisticLastMonth)),

            'dataStatisticHalfYear' => json_encode(StatisticHelper::convertArrayForChart($this->statisticService->getStatisticForPeriod(6, $machine->id))),
            'dataStatisticLastYear' => json_encode(StatisticHelper::convertArrayForChart($this->statisticService->getStatisticForPeriod(12, $machine->id))),
            'dataStatisticAllTime' => json_encode(StatisticHelper::convertArrayForChart($this->statisticService->getStatisticForAllTime($machine->id))),
            'dataRequestForChart' => json_encode($dataRequestForChart)
        ]);
    }

    public function delete (Machine $machine)
    {
        if (Gate::denies('delete', [$machine])){
            abort(403, "У Вас нет прав для удаления данного автомата!");
        }
        resolve(WaterAdditionRepository::class)->removeByMachineId($machine->id);
        resolve(ErrorRepository::class)->removeByMachineId($machine->unique_number);
        $machine->delete();
        return redirect()->route('dashboard.machine')->with(['success' => "Автомат удален"]);
    }
}
