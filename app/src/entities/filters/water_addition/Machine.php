<?php

namespace App\src\entities\filters\water_addition;

use Illuminate\Database\Eloquent\Builder;

class Machine
{
    public static function apply(Builder $builder, $value)
    {
        if ($value){
            return $builder
                ->whereIn('machine_id', $value)
                ->orderBy('id', 'desc');
        }
    }
}