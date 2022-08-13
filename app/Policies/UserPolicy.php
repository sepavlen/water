<?php

namespace App\Policies;

use App\User;
use http\Env\Request;
use Illuminate\Auth\Access\HandlesAuthorization;

class UserPolicy
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

    public function update (User $user)
    {
        return $user->isAdmin();
    }

    public function seeFullAddress (User $user)
    {
        return $user->role != User::ROLE_PARTNER && $user->role != User::ROLE_MANAGER;
    }
}
