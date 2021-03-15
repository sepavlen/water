<?php


namespace App\src\services;

use App\src\entities\Machine;
use App\src\repositories\MachineRepository;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class MachineService
{
    private $repository;
    
    public function __construct(MachineRepository $repository)
    {
        $this->repository = $repository;
    }
    
    public function getUserByEmail ($email) 
    {
        return $this->repository->getUserByParams(['email' => $email]);
    }

    public function machine_validate (Request $request)
    {
        $request->validate($this->getRules(), $this->getMessages());
    }

    public function machineValidateUpdate (Request $request)
    {
        $request->validate($this->getRulesUpdate($request->user_id), $this->getMessages());
    }

    public function save (Request $request)
    {
        $machine = $this->repository->getMachine();
        $machine->fill($request->all());
        return $this->repository->save($machine);
    }

    public function update (Machine $machine, Request $request)
    {
        $machine->fill($request->all());
        return $this->repository->save($machine);
    }

    public function getMachines ()
    {
        if (Auth::user()->isAdmin()){
            return $this->repository->getAllMachines();
        }
        return $this->repository->getAllMachinesByUserId( Auth::id());
    }

    public function getModel ()
    {
        return $this->repository->getMachine();
    }

    public function getMachineById ($id)
    {
        return $this->repository->getMachineByParams(['id' => $id]);
    }

    public function getRules ()
    {
        return [
            'unique_number' => 'required|unique:machines|max:255',
            'user_id' => 'required|integer',
            'price' => 'required|numeric',
            'status' => 'required|integer',
            'water_up' => 'required|integer',
            'water_down' => 'required|integer',
            'max_banknotes' => 'required|integer',
            'max_coins' => 'required|integer',
            'timing_connect' => 'required|integer',
            'calibration' => 'required|integer',
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
            'unique_number.unique' => 'Автомат с таким номером уже существует!',
            'unique_number.integer' => 'Номер автомата должен быть числом!',
            'unique_number.max' => 'Уникальный номер слишком длинный!',
            'unique_number.required' => 'Вы забыли ввести уникальный номер!',
            'user_id.required' => 'Вы забыли указать пользователя!',
            'price.required' => 'Вы забыли указать цену!',
            'status.required' => 'Вы забыли указать статус!',
            'water_up.required' => 'Вы забыли указать верхний уровень воды!',
            'water_down.required' => 'Вы забыли указать нижний уровень воды!',
            'max_banknotes.required' => 'Вы забыли указать количество купюр!',
            'max_coins.required' => 'Вы забыли указать количество монет!',
            'timing_connect.required' => 'Вы забыли указать время выхода на связь!',
            'calibration.required' => 'Вы забыли указать калибровку!',
        ];
    }
    
}