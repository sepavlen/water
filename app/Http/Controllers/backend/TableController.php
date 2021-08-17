<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use App\src\services\MachineService;
use App\src\services\OrderService;

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
        $machines_statistic = $this->orderService->getOrderStatisticArray($machines);
        return view('backend.table.index', compact('machines', 'machines_statistic'));
    }

    public function mobileTable ()
    {
        $machines = resolve(MachineService::class)->getMachinesPaginate();
        $machines_statistic = $this->orderService->getOrderStatisticArray($machines);
        return view('backend.table.mobile-table', compact('machines', 'machines_statistic'));
    }
}
