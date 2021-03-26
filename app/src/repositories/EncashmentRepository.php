<?php


namespace App\src\repositories;


use App\src\entities\Encashment;

class EncashmentRepository
{
    public function getEncashment ()
    {
        return new Encashment();
    }

    public function getEncashmentByParams ($params)
    {
        return $this->getEncashment()->where($params)->first();
    }

    public function getAllEncashments ()
    {
        return $this->getEncashment()->all();
    }

    public function save (Encashment $encashment)
    {
        dd($encashment->save());
        $encashment->save();
        return $encashment;
    }

}