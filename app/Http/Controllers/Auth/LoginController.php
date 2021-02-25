<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\src\services\UserService;
use App\User;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;

class LoginController extends Controller
{

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = 'dashboard';

    /**
     * Create a new controller instance.
     *
     * @return void
     */

    public $service;
    public function __construct(UserService $service)
    {
        $this->service = $service;
        $this->middleware('guest')->except('logout');
    }

    protected function validateLogin(Request $request)
    {
        $request->validate([
            $this->username() => 'required|string|exists:users',
            'password' => 'required|string',
        ]);

        $user = $this->service->getUserByEmail($request->email);

        if (password_verify($request->password, $user->password) && $user->status == User::STATUS_BLOCKED){
            $this->sendFailedLoginResponse($request);
        }
    }

}
