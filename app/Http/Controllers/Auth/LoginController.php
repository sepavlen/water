<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\src\services\UserService;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
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
    
    public function login ()
    {
        return view('auth.login');
    }
    
    public function authenticate (Request $request) 
    {
        $this->validateLogin($request);

        $credentials = $request->only('email', 'password');

        if (Auth::attempt($credentials, $request->remember)) {
            $request->session()->regenerate();

            return redirect()->intended('dashboard');
        }

        return back()->withErrors([
            'error' => 'Неверный логин или пароль!',
        ]);
    }

    protected function validateLogin(Request $request)
    {
        $this->validate($request,[
            'email' => 'required|string',
            'password' => 'required|string',
        ], [
            'email.required' => "Поле Email не может быть пустым!",
            'password.required' => "Поле Password не может быть пустым!",
        ]);

        $user = $this->service->getUserByEmail($request->email);

        if ($user && $user->status == User::STATUS_BLOCKED){
            return back()->withErrors([
                'error' => 'У Вас нет доступа!',
            ]);
        }
    }

    public function logout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/login');
    }

}
