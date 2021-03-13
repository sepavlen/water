<?php


namespace App\src\services;

use App\src\entities\Machine;
use App\src\repositories\MachineRepository;
use Illuminate\Http\Request;

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
        return $this->repository->getAllMachines();
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
            'unique_number' => 'required|integer|unique:machines',
            'user_id' => 'required|integer',
            'price' => 'required|numeric',
            'status' => 'required|integer',
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
            'unique_number.required' => 'Вы забыли ввести уникальный номер!',
            'user_id.required' => 'Вы забыли указать пользователя!',
            'price.required' => 'Вы забыли указать цену!',
            'status.required' => 'Вы забыли указать статус!',
        ];
    }
    
}