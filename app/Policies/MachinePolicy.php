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
        return $user->isAdmin() || $user->id == $machine->user_id;
    }
}
