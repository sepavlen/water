<?php

namespace App\src\entities\filters\error;

use Illuminate\Database\Eloquent\Builder;

class Date
{
    public static function apply(Builder $builder, $value)
    {
        if ($value){
            $value = explode('---', $value);
            $date_from = $value[0];
            $date_to = $value[1];
            return $builder
                ->where('created_at', '>=', $date_from . ' 00:00:00')
                ->where('created_at', '<=', $date_to . ' 23:59:59')
                ->orderBy('id', 'desc');
        }
    }
}