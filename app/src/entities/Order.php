<?php

namespace App\src\entities;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $guarded = [];

    protected $table = 'orders';

    public static function tableName ()
    {
        return 'orders';
    }

    public function machine ()
    {
        return $this->belongsTo(Machine::class);
    }
}
