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
        return $this->getEncashment()->orderBy('id', 'desc')->with('machine.user')->paginate(20);
    }

    public function save (Encashment $encashment)
    {
        $encashment->save();
        return $encashment;
    }

}