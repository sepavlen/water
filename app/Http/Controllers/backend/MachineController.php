<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use App\src\services\MachineService;
use App\src\services\UserService;
use Illuminate\Http\Request;

class MachineController extends Controller
{
    public $service;
    public $userService;

    public function __construct(MachineService $service, UserService $userService)
    {
        $this->service = $service;
        $this->userService = $userService;
    }

    public function machine () 
    {
        $machines = $this->service->getMachines();
        return view('backend.machine.machine', compact('machines'));
    }

    public function create ()
    {
        $machine = $this->service->getModel();
        $users = $this->userService->getAllUsers()->toArray();
        return view('backend.machine.create', compact('machine', 'users'));
    }
}
