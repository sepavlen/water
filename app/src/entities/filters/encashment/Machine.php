<?php

namespace App\src\entities\filters\encashment;

use App\src\filters\Filterable;
use Illuminate\Database\Eloquent\Builder;

class Machine implements Filterable
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