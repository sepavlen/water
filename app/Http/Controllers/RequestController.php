<?php

namespace App\Http\Controllers;
use App\src\helpers\ErrorHelper;
use App\src\services\EncashmentService;
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
    /**
     * @var EncashmentService
     */
    public $encashmentService;

    public function __construct(
        MachineService $machineService,
        OrderService $orderService,
        EncashmentService $encashmentService
    )
    {
        $this->machineService = $machineService;
        $this->orderService = $orderService;
        $this->encashmentService = $encashmentService;
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
            if ($request->com == 3){
//                dd(array_sum($request->except(['com', 'n'])));
//                dd(array_sum($request->except(['com', 'n'])));
//                ErrorHelper::checkOrderError($request);
                $this->encashmentService->save($request);
            }
        }
    }
}
