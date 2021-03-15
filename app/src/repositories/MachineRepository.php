<?php


namespace App\src\repositories;


use App\src\entities\Machine;
use App\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;

class MachineRepository
{
    public function getMachine ()
    {
        return new Machine();
    }

    public function getMachineByParams ($params)
    {
        return $this->getMachine()->where($params)->first();
    }

    public function getAllMachines ()
    {
        return $this->getMachine()->all();
    }

    public function getAllMachinesByUserId ($user_id)
    {
        return $this->getMachine()->where(['user_id' => $user_id])->get();
    }
    
    public function save ($machine)
    {
        return $machine->save();
    }

}