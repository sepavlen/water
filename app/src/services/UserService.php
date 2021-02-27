<?php


namespace App\src\services;

use App\src\repositories\UserRepository;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

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

    public function userValidateUpdate (Request $request)
    {
        $request->validate($this->getRulesUpdate($request->user_id), $this->getMessages());
    }

    public function save (Request $request)
    {
        $user = $this->repository->getUserOrCreate(['id' => $request->user_id]);
        $user->fill($request->except(['password']));
        if ($request->password)
            $user->password = Hash::make($request->password);
        return $this->repository->save($user);
    }

    public function getUsers ()
    {
        return $this->repository->getAllUsers();
    }

    public function getModel ()
    {
        return $this->repository->getUser();
    }

    public function getUserById ($id)
    {
        return $this->repository->getUserByParams(['id' => $id]);
    }

    public function getRules ()
    {
        return [
            'password' => 'required|min:6|confirmed',
            'email' => 'required|email|unique:users',
        ];
    }

    public function getRulesUpdate ($user_id)
    {
        return [
            'password' => 'nullable|min:6|confirmed',
            'email' => 'required|email|unique:users,email,' . $user_id,
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