<?php

namespace App\src\services;

use App\src\entities\WaterAddition;
use App\src\repositories\WaterAdditionRepository;
use Illuminate\Http\Request;

class WaterAdditionService
{
    public $repository;

    public function __construct(WaterAdditionRepository $repository)
    {
        $this->repository = $repository;
    }

    public function getModel ()
    {
        return new WaterAddition();
    }

    public function save ($request, $machine)
    {
        $model = $this->getModel();
        $this->load($model, $request, $machine);
        $model->save();
    }

    public function load (&$model, $request, $machine)
    {
        $model->machine_id = $machine->id;
        $model->water_given = $request->l - $machine->water_amount;
    }


    public function createIfWaterAddition ($machine, Request $request)
    {
        if ($request->l > $machine->water_amount){
            $this->save($request, $machine);
        }
    }

    public function getLostWaterAdded ()
    {
        return $this->repository->getLostWaterAdded();
    }
}