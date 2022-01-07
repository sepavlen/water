<?php


namespace App\src\services;

use App\src\entities\UsersMachines;
use App\src\repositories\UserRepository;
use App\User;
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
        $user =  $this->repository->save($user);

        $this->updateDriverMachines($request, $user);
        return $user;
    }

    public function getUsers ()
    {
        return $this->repository->getUsers();
    }

    public function getAllUsers ()
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

    public function updateDriverMachines (Request $request, User $user)
    {
        UsersMachines::where('user_id', $user->id)->delete();
        if ($request->machines && $user->role == User::ROLE_DRIVER){
            $machines = array_map(function ($machine) use ($user){
                return ['user_id' => $user->id, "machine_id" => $machine];
            }, $request->machines);
            UsersMachines::insert($machines);
        }
    }
    
}