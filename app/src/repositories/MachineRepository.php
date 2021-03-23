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

    public function createDefaultMachine (Request $request)
    {
        $model = $this->getMachine();
        $machine = $this->load($model, $request);
        return $this->save($machine);
    }

    public function updateContactTimeAndAmountCount (Machine $machine, Request $request)
    {
        $machine->water_amount = $request->l;
        $machine->contact_time = date('Y-m-d H:i:s');
        return $machine->save();
    }
    
    public function save ($machine)
    {
        return $machine->save();
    }

    public function load ($model, Request $request)
    {
        $model->unique_number = $request->n;
        $model->water_amount = $request->l;
        $model->contact_time = date('Y-m-d H:i:s');
        $model->user_id = User::ID_ADMIN;
        $model->status = Machine::STATUS_NEW;
        return $model;
    }

}