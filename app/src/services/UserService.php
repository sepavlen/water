<?php


namespace App\src\services;

use App\src\repositories\UserRepository;
use Illuminate\Http\Request;

class UserService
{
    private $repository;
    
    public function __construct(UserRepository $repository)
    {
        $this->repository = $repository;
    }
    
    public function getUserByEmail ($email) 
    {
        return $this->repository->getUserByParams(['email' => $email]);
    }

    public function user_validate (Request $request)
    {
        $request->validate($this->getRules(), $this->getMessages());
    }

    public function save (Request $request)
    {
        return $this->repository->save($request);
    }

    public function getUsers ()
    {
        return $this->repository->getAllUsers();
    }

    public function getRules ()
    {
        return [
            'password' => 'required|min:6|confirmed',
            'email' => 'required|email|unique:users',
        ];
    }

    public function getMessages ()
    {
        return [
            'email.unique' => 'Пользователь с таким email уже существует!',
            'password.required' => 'Вы забыли ввести пароль!',
            'password.min' => 'Пароль должен иметь не менее 6-и сомволов!',
            'password.confirmed' => 'Пароли не совпали!',
            'email.required' => 'Поле Email обязательно для заполнения!',
            'email.email' => 'Поле Email введено неправильно!',
        ];
    }
    
}