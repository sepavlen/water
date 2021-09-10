<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use App\src\entities\Error;
use App\src\services\MachineService;
use Illuminate\Http\Request;

class ErrorController extends Controller
{
    public $machineService;

    public function __construct(MachineService $machineService)
    {
        $this->machineService = $machineService;
    }

    public function index (Request $request, Error $error)
    {
        $errors = $error->getBySearch($request)->paginate(50);
        $machines = $this->machineService->getMachines();
        return view('backend.error.error', compact('machines', 'errors'));
    }
}
