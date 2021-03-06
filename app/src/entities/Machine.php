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
    protected $table = 'machines';

    public static function tableName ()
    {
        return 'machines';
    }

    public function user ()
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }

    public function errors ()
    {
        return $this->hasMany(Error::class, 'machine_number', 'machine_number');
    }

    public function orders ()
    {
        return $this->hasMany(Order::class, 'id', 'machine_id');
    }

    public function waterAddition ()
    {
        return $this->hasMany(WaterAddition::class, 'machine_id', 'id');
    }

    public function encashment ()
    {
        return $this->belongsToMany(Encashment::class);
    }
}
