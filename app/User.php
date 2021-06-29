<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use Notifiable;
    const STATUS_ACTIVE = 1,
          STATUS_BLOCKED = 2,
          ROLE_ADMIN = 1,
          ROLE_MANAGER = 2,
          ROLE_PARTNER = 3,
          ROLE_GENERAL_PARTNER = 4,
          ID_ADMIN = 1;



    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password', 'status', 'role'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function isAdmin ()
    {
        return $this->role == self::ROLE_ADMIN;
    }

    public function isGeneralPartner ()
    {
        return $this->role == self::ROLE_GENERAL_PARTNER;
    }
}
