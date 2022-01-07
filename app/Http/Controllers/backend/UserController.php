<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use App\src\entities\Machine;
use App\src\services\MachineService;
use App\src\services\UserService;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;

class UserController extends Controller
{
    public $userService;
    public $machineService;

    public function __construct(UserService $userService, MachineService $machineService)
    {
        $this->userService = $userService;
        $this->machineService = $machineService;
    }

    public function index ()
    {
//        if (Gate::denies('watch', [Auth::user()])){
//            abort(403, "У Вас нет прав для просмотра просмотра пользователей!");
//        }
        $users = $this->userService->getUsers();
        return view('backend.user.index', compact('users'));
    }

    public function create ()
    {
        $user = $this->userService->getModel();
        $machines = $this->machineService->getMachines();
        return view('backend.user.create', compact('user', 'machines'));
    }

    public function save (Request $request)
    {
        $this->userService->user_validate($request);
        if ($this->userService->save($request)){
            return redirect()->route('dashboard.users')->with(['success' => "Вы создали нового пользователя"]);
        }
        return redirect()->back()->with(['errors' => "Не удалось создать пользователя"]);
    }

    public function edit (User $user)
    {
        $machines = $this->machineService->getWithoutAlreadySelectedDriverMachines($user->id);
        $selected_machines = array_merge($this->machineService->getSelectedUserMachines($user->id)->toArray(), (array)old('machines'));
        return view('backend.user.create', compact('user', 'machines', 'selected_machines'));
    }

    public function update (Request $request)
    {
        $this->userService->userValidateUpdate($request);
        if ($this->userService->save($request)){
            return redirect()->back()->with(['success' => "Данные пользователя сохранены"]);
        }
        return redirect()->back()->with(['errors' => "Ошибка редактирования!"]);
    }

    public function destroy ($id)
    {
        $user = $this->userService->getUserById($id);
        if ($user->delete()){
            return redirect()->back()->with(['success' => "Пользователь удален"]);
        }
        return redirect()->back()->with(['errors' => "Ошибка удаления!"]);
    }
}
