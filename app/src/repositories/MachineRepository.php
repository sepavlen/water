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

    public function getMachineOrCreate ($id)
    {
        if ($id){
            $machine = $this->getMachineByParams(['id' => $id]);
            if ($machine)
                return $machine;
        }
        return $this->getMachine();
    }
    
    public function save ($machine)
    {
        return $machine->save();
    }
}