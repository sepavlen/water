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
    private $waterAdditionService;

    public function __construct(MachineRepository $repository, WaterAdditionService $waterAdditionService)
    {
        $this->repository = $repository;
        $this->waterAdditionService = $waterAdditionService;
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
        $machine->contact_time = date("Y-m-d H:i:s");
        return $this->repository->save($machine);
    }

    public function update (Machine $machine, Request $request)
    {
        $machine->fill($request->all());
        if ($machine->status == Machine::STATUS_NEW){
            $machine->status = Machine::STATUS_ACTIVE;
        }
        return $this->repository->save($machine);
    }

    public function getMachines ()
    {
        if (Auth::user()->isAdmin()){
            return $this->repository->getAllMachines();
        }
        if (Auth::user()->isDriver()){
            return $this->repository->getAllDriverMachines();
        }
        if (Auth::user()->isGeneralPartner()){
            return $this->repository->getAllMachinesForGeneralPartner();
        }
        return $this->repository->getAllMachinesByUserId( Auth::id());
    }

    public function getWithoutAlreadySelectedDriverMachines ($user_id)
    {
        return $this->repository->getWithoutAlreadySelectedDriverMachines($user_id);
    }

    public function getSelectedUserMachines ($user_id)
    {
        return $this->repository->getSelectedUserMachines($user_id);
    }

    public function getMachinesPaginate ()
    {
        if (Auth::user()->isAdmin()){
            return $this->repository->getAllMachinesPaginate();
        }
        if (Auth::user()->isDriver()){
            return $this->repository->getAllDriverMachinesPaginate();
        }
        if (Auth::user()->isGeneralPartner()){
            return $this->repository->getAllMachinesForGeneralPartnerPaginate();
        }
        return $this->repository->getAllMachinesByUserIdPaginate( Auth::id());
    }

    public function getModel ()
    {
        return $this->repository->getMachine();
    }

    public function getMachineByUniqueNumber ($unique_number)
    {
        return $this->repository->getMachineByParams(['unique_number' => $unique_number]);
    }

    public function updateOrCreateDefaultMachine (Request $request)
    {
        if ($request->has('n')){
            $machine = $this->getMachineByUniqueNumber($request->n);
            if (!$machine){
                if ($machine = $this->createDefaultMachine($request)){
                    $this->repository->updateAmountWater($machine, $request);
                    echo "Автомат создан";
                }
            } else {
                $this->waterAdditionService->createIfWaterAddition($machine, $request);
                if ($this->repository->updateContactTimeAndAmountCount($machine, $request)){
                    echo "Автомат обновлен";
                }
            }
        }
    }

    public function createDefaultMachine (Request $request)
    {
        return $this->repository->createDefaultMachine($request);
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