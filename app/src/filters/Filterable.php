<?php
/**
 * Created by PhpStorm.
 * User: Viktor
 * Date: 01.12.2019
 * Time: 22:13
 */

namespace App\src\filters;


use Illuminate\Database\Eloquent\Builder;

interface Filterable
{
    public static function apply(Builder $builder, $value);
}