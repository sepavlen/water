<?php

namespace App\Http\Controllers;
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
                if ($request->has('tw') && $request->tw){
                    if ($request->session()->has('request_error.'.$request->n)){
                        $request->session()->forget('request_error.'.$request->n);
                    }
                    $request->session()->put('request_error.'.$request->n, $request->tw);
                } else {
                    if ($request->session()->has('request_error.'.$request->n)){
                        $request->session()->forget('request_error.'.$request->n);
                    }
                }
                $this->machineService->updateOrCreateDefaultMachine($request);
            }
        }
    }
}
