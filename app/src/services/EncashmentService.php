<?php


namespace App\src\services;

use App\src\entities\Encashment;
use App\src\repositories\EncashmentRepository;
use Illuminate\Http\Request;

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
        $this->repository->save($encashment);
        echo "Заказ создан";
    }

    public function load(Encashment $encashment, Request $request)
    {
        if (!$machine = $this->machineService->getMachineByUniqueNumber($request->n)){
            $machine = $this->machineService->createDefaultMachine($request);
        }
        $encashment->fill($request->only($this->fields));
        $encashment->machine_id = $machine->id;
        $encashment->machine_unique_number = $request->n;
        $encashment->total = array_sum($request->only($this->fields));
        return $this->repository->save($encashment);
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