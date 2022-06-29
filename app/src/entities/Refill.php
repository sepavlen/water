<?php

namespace App\src\entities;

use Illuminate\Database\Eloquent\Model;

class Refill extends Model
{
    protected $table = 'refill';
//    public $timestamps = false;
    const CREATED_AT = 'datetime_created';
    const UPDATED_AT = null;
    const STATUS_NEW = 0;
    const STATUS_PAYED = 1;

    protected $guarded = [];


}
