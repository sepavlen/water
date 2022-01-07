<?php

namespace App;

use App\src\entities\Machine;
use App\src\entities\UsersMachines;
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
          ROLE_DRIVER = 5,
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

    public function machines ()
    {
        return $this->belongsToMany(Machine::class, 'users_machines');
    }

    public function isAdmin ()
    {
        return $this->role == self::ROLE_ADMIN;
    }

    public function isGeneralPartner ()
    {
        return $this->role == self::ROLE_GENERAL_PARTNER;
    }

    public function isDriver ()
    {
        return $this->role == self::ROLE_DRIVER;
    }
}
