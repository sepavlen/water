<?php


namespace App\src\services;

use App\src\entities\Encashment;
use App\src\helpers\CollectionHelper;
use App\src\repositories\EncashmentRepository;
use Illuminate\Http\Request;
use phpDocumentor\Reflection\Types\False_;

class EncashmentService
{
    private $repository;
    private $machineService;
    private $fields = ['b1', 'b2', 'b3', 'b4', 'b5', 'b6', 'c1', 'c2', 'c3', 'c4', 'c5', 'c6'];

    public function __construct(EncashmentRepository $repository, MachineService $machineService)
    {
        $this->repository = $repository;
        $this->machineService = $machineService;
    }

    public function save (Request $request)
    {
        $encashment = $this->repository->getEncashment();
        $this->load($encashment, $request);
        if ($encashment->getAttributes())
            if (!$this->todayAlreadyAdded($request))
                $this->repository->save($encashment);
    }

    public function load(Encashment &$encashment, Request $request)
    {
        if (!$machine = $this->machineService->getMachineByUniqueNumber($request->n)){
            $machine = $this->machineService->createDefaultMachine($request);
        }
        $fields = $request->only($this->fields);
        if (array_sum($fields)){
            $encashment->fill($fields);
            $encashment->machine_id = $machine->id;
            $encashment->machine_unique_number = $request->n;
            $encashment->total = array_sum($fields);
        }

    }

    protected function todayAlreadyAdded (Request $request)
    {
        if ($encashments = $this->getEncashmentTodayByMachineNumber($request->n)){
            $request_total = CollectionHelper::getTotalSum($request);
            foreach ($encashments as $encashment) {
                if (CollectionHelper::getTotalSum($encashment) == $request_total){
                    return true;
                }
            }
        }
        return false;
    }

    protected function getEncashmentTodayByMachineNumber ($machine_number)
    {
        return $this->repository->getEncashmentTodayByMachineNumber($machine_number);
    }

    public function getEncashments ()
    {
        return $this->repository->getAllEncashments();
    }

    public function getModel ()
    {
        return $this->repository->getEncashment();
    }

}