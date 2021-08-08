<?php
/**
 * Created by PhpStorm.
 * User: Viktor
 * Date: 01.12.2019
 * Time: 22:12
 */

namespace App\src\filters;


use Illuminate\Http\Request;

interface Searchable
{
    public function apply(Request $request);
}