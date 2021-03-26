<?php

namespace App\Http\Controllers;
use App\src\helpers\ErrorHelper;
use App\src\services\MachineService;
use App\src\services\OrderService;
use Illuminate\Http\Request;

class RequestController extends Controller
{
    /**
     * @var MachineService
     */
    public $machineService;
    /**
     * @var OrderService
     */
    public $orderService;

    public function __construct(MachineService $machineService, OrderService $orderService)
    {
        $this->machineService = $machineService;
        $this->orderService = $orderService;
    }

    public function index (Request $request)
    {
        if (ErrorHelper::checkUnknownMachineNumber($request)){
            return;
        }
        if ($request->has('com')){
            if ($request->com == 1){
                ErrorHelper::checkRequestErrors($request);
                $this->machineService->updateOrCreateDefaultMachine($request);
            }
            if ($request->com == 2){
                ErrorHelper::checkOrderError($request);
                $this->orderService->save($request);
            }
        }
    }
}
