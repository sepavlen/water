<?php


namespace App\src\repositories;


use App\User;
use Illuminate\Support\Facades\Auth;

class UserRepository
{
    public function getUser ()
    {
        return new User();
    }

    public function getUserByParams ($params)
    {
        return $this->getUser()->where($params)->first();
    }

    public function getUsers ()
    {
        return $this->getUser()->where('id', "<>", Auth::id())->get();
    }

    public function getAllUsers ()
    {
        return User::where('role', '!=', User::ROLE_DRIVER)->get();
    }

    public function getUserOrCreate ($id)
    {
        if ($id){
            $user = $this->getUserByParams(['id' => $id]);
            if ($user)
                return $user;
        }
        return $this->getUser();
    }
    
    public function save ($user)
    {
        $user->save();
        return $user;
    }
}