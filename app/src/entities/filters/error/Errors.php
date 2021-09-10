<?php

namespace App\src\entities\filters\error;

use App\src\helpers\ErrorHelper;
use Illuminate\Database\Eloquent\Builder;

class Errors
{
    public static function apply(Builder $builder, $value)
    {
        if ($value){
            $values = ErrorHelper::getDescriptionErrorsByCode($value);
            if (count($values) <= 1){
                $builder->where('description', 'like', $values[0]);
            } else {
                $sql = '(`description` like "'. $values[0] . '"';
                if ($values){
                    foreach ($values as $key => $value) {
                        if ($key != 0){
                            $sql .= ' or `description` like "' . $value . '"';
                        }
                    }
                }
                $sql .= ')';
                $builder->whereRaw($sql);
            }
            return $builder->orderBy('id', 'desc');
        }
    }
}