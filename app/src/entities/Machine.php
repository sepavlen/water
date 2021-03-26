<?php

namespace App\src\entities;

use App\User;
use Illuminate\Database\Eloquent\Model;

class Machine extends Model
{
    const STATUS_ACTIVE = 1;
    const STATUS_BLOCKED = 2;
    const STATUS_NEW = 3;

    protected $guarded = [];

    public static function tableName ()
    {
        return 'machines';
    }

    public function user ()
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }

    public function orders ()
    {
        return $this->belongsToMany(Order::class);
    }

    public function encashment ()
    {
        return $this->belongsToMany(Encashment::class);
    }
}
