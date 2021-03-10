<?php

namespace App\src\entities;

use App\User;
use Illuminate\Database\Eloquent\Model;

class Machine extends Model
{
    const STATUS_ACTIVE = 1;
    const STATUS_BLOCKED = 2;

    public function getUser ()
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }
}
