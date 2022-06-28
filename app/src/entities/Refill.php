<?php

namespace App\src\entities;

use Illuminate\Database\Eloquent\Model;

class Refill extends Model
{
    protected $table = 'refill';
    public $timestamps = false;

    const STATUS_NEW = 0;
    const STATUS_PAYED = 1;

    protected $fillable = ['machine_id', 'order_id', 'amount'];
}
