<?php

namespace App\Http\Controllers;
use App\src\helpers\ErrorHelper;
use App\src\services\EncashmentService;
use App\src\services\ErrorService;
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
    /**
     * @var ErrorService
     */
    public $errorService;

    public function __construct(
        MachineService $machineService,
        OrderService $orderService,
        EncashmentService $encashmentService,
        ErrorService $errorService
    )
    {
        $this->machineService = $machineService;
        $this->orderService = $orderService;
        $this->encashmentService = $encashmentService;
        $this->errorService = $errorService;
    }

    public function index (Request $request)
    {
        if ($request->has('com')){
            if ($request->com == 1){
                $this->errorService->checkRequestErrors($request);
                $this->machineService->updateOrCreateDefaultMachine($request);
            }
            if ($request->com == 2){
                $this->orderService->save($request);
            }
            if ($request->com == 3){
                $this->encashmentService->save($request);
            }
        }
    }
}
