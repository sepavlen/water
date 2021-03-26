<?php

use App\User;
use Illuminate\Support\Facades\Auth;

function isAdmin(){
    return Auth::user()->role == User::ROLE_ADMIN;
}

 function dec2hex($dec) {
    $hex = ($dec == 0 ? '0' : '');

    while ($dec > 0) {
        $hex = dechex($dec - floor($dec / 16) * 16) . $hex;
        $dec = floor($dec / 16);
    }

    return $hex;
}
