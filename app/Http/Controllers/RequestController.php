<?php

namespace App\Http\Controllers;
use App\src\helpers\ErrorHelper;
use App\src\services\MachineService;
use Illuminate\Http\Request;

class RequestController extends Controller
{
    /**
     * @var MachineService
     */
    public $machineService;

    public function __construct(MachineService $machineService)
    {
        $this->machineService = $machineService;
    }

    public function index (Request $request)
    {
        if ($request->has('com')){
            if ($request->com == 1){
                ErrorHelper::checkRequestErrors($request);
                $this->machineService->updateOrCreateDefaultMachine($request);
            }
        }
    }
}
