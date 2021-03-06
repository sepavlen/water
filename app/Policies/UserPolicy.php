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
}
