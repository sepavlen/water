<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use App\src\services\UserService;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;

class UserController extends Controller
{
    public $userService;

    public function __construct(UserService $userService)
    {
        $this->userService = $userService;
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
        return view('backend.user.create', compact('user'));
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
        return view('backend.user.create', compact('user'));
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
