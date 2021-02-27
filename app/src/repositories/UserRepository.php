<?php


namespace App\src\repositories;


use App\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;

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

    public function getAllUsers ()
    {
        return $this->getUser()->where('id', "<>", Auth::id())->get();
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
        return $user->save();
    }
}