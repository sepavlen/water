<?php

namespace App\src\entities\filters\error;

use Illuminate\Database\Eloquent\Builder;

class Machine
{
    public static function apply(Builder $builder, $value)
    {
        if ($value){
            return $builder->whereHas('machine', function ($query) use ($value){
                return $query->whereIn('id', $value)
                    ->orderBy('id', 'desc');
            });
        }
    }
}