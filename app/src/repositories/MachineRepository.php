<?php


namespace App\src\repositories;


use App\src\entities\Machine;
use App\User;
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

    public function getAllDriverMachines ()
    {
        return $this->getMachine()
            ->leftJoin('users_machines', function ($join){
            $join->on('users_machines.machine_id', '=', 'machines.id');
        })
            ->where('users_machines.user_id', \Auth::id())
            ->get();
    }

    public function getAllMachinesPaginate ()
    {
        return $this->getMachine()->paginate(10);
    }

    public function getAllDriverMachinesPaginate ()
    {
        return $this->getMachine()
            ->leftJoin('users_machines', function ($join){
            $join->on('users_machines.machine_id', '=', 'machines.id');
        })
            ->where('users_machines.user_id', \Auth::id())->paginate(10);
    }

    public function getAllMachinesForGeneralPartner ()
    {
        return $this->getMachine()->whereHas('user', function ($query) {
            return  $query->whereIn('role', [User::ROLE_PARTNER, User::ROLE_GENERAL_PARTNER]);
        })->get();
    }

    public function getAllMachinesForGeneralPartnerPaginate ()
    {
        return $this->getMachine()->whereHas('user', function ($query) {
            return  $query->whereIn('role', [User::ROLE_PARTNER, User::ROLE_GENERAL_PARTNER]);
        })->paginate(10);
    }

    public function getAllMachinesByUserId ($user_id)
    {
        return $this->getMachine()->where('user_id', $user_id)->get();
    }

    public function getWithoutAlreadySelectedDriverMachines ($user_id)
    {
        return $this->getMachine()
            ->select([
                'machines.id',
                'machines.unique_number',
                'machines.address',
                'users_machines.machine_id',
                'users_machines.user_id',
            ])
            ->leftJoin('users_machines', function ($join){
                $join->on('users_machines.machine_id', '=', 'machines.id');
            })
            ->where('users_machines.user_id', $user_id)
            ->orWhereNull('machine_id')
            ->get();
    }

    public function getSelectedUserMachines ($user_id)
    {
        return $this->getMachine()
            ->select([
                'machines.id',
                'machines.unique_number',
                'machines.address',
                'users_machines.machine_id',
                'users_machines.user_id',
            ])
            ->leftJoin('users_machines', function ($join){
                $join->on('users_machines.machine_id', '=', 'machines.id');
            })
            ->where('users_machines.user_id', $user_id)
            ->pluck('id');
    }

    public function getAllMachinesByUserIdPaginate ($user_id)
    {
        return $this->getMachine()->where('user_id', $user_id)->paginate(10);
    }

    public function createDefaultMachine (Request $request)
    {
        $model = $this->getMachine();
        $machine = $this->load($model, $request);
        $this->save($machine);
        return $machine;
    }

    public function updateAmountWater (Machine $machine, Request $request)
    {
        $machine->water_amount = $request->l;
        $machine->save();
    }

    public function updateContactTimeAndAmountCount (Machine $machine, Request $request)
    {
        $machine->water_amount = $request->l;
        $machine->contact_time = date('Y-m-d H:i:s');
        return $machine->save();
    }
    
    public function save ($machine)
    {
        $machine->save();
        return $machine;
    }

    public function load ($model, Request $request)
    {
        $model->unique_number = $request->n;
        $model->contact_time = date('Y-m-d H:i:s');
        $model->user_id = User::ID_ADMIN;
        $model->status = Machine::STATUS_NEW;
        return $model;
    }

}