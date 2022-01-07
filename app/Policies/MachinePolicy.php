<?php

namespace App\Policies;

use App\src\entities\Machine;
use App\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class MachinePolicy
{
    use HandlesAuthorization;

    /**
     * Create a new policy instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    public function update (User $user, Machine $machine)
    {
        if ($user->isDriver()){
            return false;
        }

        if ($user->isAdmin()){
            return true;
        }
        if ($user->id == $machine->user_id){
            return true;
        }
        if ($user->isGeneralPartner() && ($machine->user->role == User::ROLE_PARTNER || $machine->user->role == User::ROLE_GENERAL_PARTNER)){
            return true;
        }
        return false;
    }

    public function change (User $user)
    {
        return $user->isAdmin();
    }

    public function delete (User $user)
    {
        return $user->isAdmin();
    }
}
