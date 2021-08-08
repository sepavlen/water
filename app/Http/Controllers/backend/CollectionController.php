<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use App\src\entities\Encashment;
use App\src\entities\Machine;
use App\src\services\EncashmentService;
use App\src\services\MachineService;
use Illuminate\Http\Request;

class CollectionController extends Controller
{
    public $encashmentService;
    public $machineService;
    public function __construct(EncashmentService $encashmentService, MachineService $machineService)
    {
        $this->encashmentService = $encashmentService;
        $this->machineService = $machineService;
    }

    public function index (Request $request, Encashment $encashment)
    {
        if (!isAdmin()){
            abort(404);
        }
        $encashments = $encashment->getBySearch($request)->paginate(50);
        $machines = $this->machineService->getMachines();

        return view('backend.collection.collection', compact('encashments', 'machines'));
    }

}
