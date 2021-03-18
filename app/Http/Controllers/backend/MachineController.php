<?php

namespace App\Http\Controllers\backend;


use App\Http\Controllers\Controller;
use App\src\entities\Machine;
use App\src\services\MachineService;
use App\src\services\UserService;
use Illuminate\Auth\Access\Response;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;

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
        if (Gate::denies('update', new Machine())){
            abort(403, "У Вас нет прав для создания нового автомата!");
        }

        $machine = $this->service->getModel();
        $users = $this->userService->getAllUsers()->toArray();
        return view('backend.machine.create', compact('machine', 'users'));
    }

    public function save (Request $request)
    {
        $this->service->machine_validate($request);
        if ($this->service->save($request)){
            return redirect()->route('dashboard.machine')->with(['success' => "Вы создали новый автомат"]);
        }
        return redirect()->route('dashboard.machine')->with(['errors' => "Не удалось создать автомат!"]);
    }

    public function edit (Machine $machine)
    {
        if (Gate::denies('update', [$machine])){
            abort(403, "У Вас нет прав для редактирования данного автомата!");
        }

        $users = $this->userService->getAllUsers()->toArray();
        return view('backend.machine.create', compact('machine', 'users'));
    }

    public function update (Machine $machine, Request $request)
    {
        if ($this->service->update($machine, $request)){
            return redirect()->route('dashboard.machine')->with(['success' => "Изменения сохранены"]);
        }
        return redirect()->route('dashboard.machine')->with(['errors' => "Не удалось изменить автомат!"]);
    }

    public function delete (Machine $machine)
    {
        if (Gate::denies('delete', [$machine])){
            abort(403, "У Вас нет прав для удаления данного автомата!");
        }
        $machine->delete();
        return redirect()->route('dashboard.machine')->with(['success' => "Автомат удален"]);
    }
}
