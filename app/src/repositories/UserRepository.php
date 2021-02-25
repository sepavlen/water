<?php


namespace App\src\repositories;


use App\User;
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
        return $this->getUser()->all();
    }
    
    public function save (Request $request) 
    {
        $user = $this->getUser();
        $user->fill($request->all());
        $user->password = Hash::make($request->password);
        return $user->save();
    }
}