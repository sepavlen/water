<?php

namespace App\src\repositories;

use App\src\entities\Machine;
use App\src\entities\WaterAddition;

class WaterAdditionRepository
{
    public function query ()
    {
        return new WaterAddition;
    }

    public function getLostWaterAdded ()
    {
        $sub = $this->query()->selectRaw('MAX(id) as id')->groupBy('machine_id')->get()->keyBy('id')->toArray();
        return $this->query()->whereIn('id', $sub)->get()->keyBy('machine_id');
    }

    public function removeByMachineId ($machine_id)
    {
        $this->query()->where(['machine_id' => $machine_id])->delete();
    }


}