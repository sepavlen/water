<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use App\src\services\UserService;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public $userService;

    public function __construct(UserService $userService)
    {
        $this->userService = $userService;
    }

    public function index ()
    {
        $users = $this->userService->getUsers();
        return view('backend.user.index', compact('users'));
    }

    public function create ()
    {
        return view('backend.user.create');
    }

    public function save (Request $request)
    {
        $this->userService->user_validate($request);
        if ($this->userService->save($request)){
            return redirect()->back()->with(['success' => "Вы создали нового пользователя"]);
        }
        return redirect()->back()->with(['errors' => "Не удалось создать пользователя"]);
    }
    

}
