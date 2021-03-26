<?php

namespace App\src\entities;

use Illuminate\Database\Eloquent\Model;

class Encashment extends Model
{
    protected $guarded = [];

    protected $table = 'encashment';

    public static function tableName ()
    {
        return 'encashment';
    }

    public function machine ()
    {
        return $this->belongsTo(Machine::class);
    }
}
