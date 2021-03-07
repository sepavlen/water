<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use App\src\services\MachineService;
use Illuminate\Http\Request;

class MachineController extends Controller
{
    public $service;

    public function __construct(MachineService $service)
    {
        $this->service = $service;
    }

    public function machine () 
    {
        $machines = $this->service->getMachines();
        return view('backend.machine.machine');
    }
}
