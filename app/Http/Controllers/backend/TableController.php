<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use App\src\entities\Machine;
use App\src\entities\WaterAddition;
use App\src\services\ErrorService;
use App\src\services\MachineService;
use App\src\services\OrderService;
use Illuminate\Http\Request;

class TableController extends Controller
{
    public $orderService;

    public function __construct(OrderService $orderService)
    {
        $this->orderService = $orderService;
    }

    public function index ()
    {
        $machines = resolve(MachineService::class)->getMachines();
        $errors = resolve(ErrorService::class)->getActiveErrors();
        $machines_statistic = $this->orderService->getOrderStatisticArray($machines);
        return view('backend.table.index', compact('machines', 'machines_statistic', 'errors'));
    }

    public function mobileTable ()
    {
        $machines = resolve(MachineService::class)->getMachinesPaginate();
        $machines_statistic = $this->orderService->getOrderStatisticArray($machines);
        return view('backend.table.mobile-table', compact('machines', 'machines_statistic'));
    }

    public function pnl (Request $request)
    {
        if (!isGeneralPartner())
            abort(401);
        $machines = $this->orderService->getPnl($request);
        return view('backend.table.pnl', compact('machines'));
    }
}
