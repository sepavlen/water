<?php

namespace App\src\entities;

use App\User;
use Illuminate\Database\Eloquent\Model;

class Machine extends Model
{
    public function getUser ()
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }
}
