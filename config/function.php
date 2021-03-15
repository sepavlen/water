<?php

use App\User;
use Illuminate\Support\Facades\Auth;

function isAdmin(){
    return Auth::user()->role == User::ROLE_ADMIN;
}
