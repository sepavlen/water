<?php

namespace App\src\entities;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{

    const WAIT_DUPLICATE_MIN = 5;
    protected $guarded = [];

    protected $table = 'orders';

    public static function tableName ()
    {
        return 'orders';
    }

    public function machine ()
    {
        return $this->belongsTo(Machine::class, 'machine_id', 'id');
    }
}
