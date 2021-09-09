<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use App\src\entities\WaterAddition;
use App\src\services\MachineService;
use Illuminate\Http\Request;

class WaterAdditionController extends Controller
{
    public $machineService;
    public function __construct(MachineService $machineService)
    {
        $this->machineService = $machineService;
    }

    public function index (Request $request, WaterAddition $water)
    {
        $waterAddition = $water->getBySearch($request)->paginate(50);
        $machines = $this->machineService->getMachines();
        return view('backend.water-addition.index', compact('waterAddition', 'machines'));
    }
}
