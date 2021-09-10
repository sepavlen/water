<?php

namespace App\src\repositories;

use App\src\entities\Error;
use App\User;

class ErrorRepository
{

    public function error ()
    {
        return new Error();
    }

    public function getErrorByParams ($params)
    {
        return $this->error()->where($params)->first();
    }

    public function removeByMachineId ($machine_number)
    {
        $this->error()->where(['machine_number' => $machine_number])->delete();
    }

    public function setStatusInactive ($machine_number)
    {
        $this->error()->where(['machine_number' => $machine_number])->update(['status' => Error::STATUS_INACTIVE]);
    }

    public function getActiveErrors ()
    {
        return $this->error()->whereHas('machine', function ($query) {
            if (isGeneralPartner()){
                $query->join('users', function ($join) {
                    $join->on('user_id', '=', 'users.id');
                })->whereIn('users.role', [User::ROLE_GENERAL_PARTNER, User::ROLE_PARTNER]);
            }
            if (isDefaultUser())
                $query->where('user_id', \Auth::id());
            return $query;
        })
            ->where('status', Error::STATUS_ACTIVE)
            ->get()
            ->keyBy('machine_number')
            ->toArray();
    }

}