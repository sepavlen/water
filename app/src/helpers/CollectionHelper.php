<?php

namespace App\src\helpers;

class CollectionHelper
{
    public static function getTotalSum ($collection)
    {
        return array_sum([
            isset($collection->c1) ? $collection->c1 * 0.5 : 0, //32.5
            isset($collection->c2) ? $collection->c2 * 1 : 0, //21
            isset($collection->c3) ? $collection->c3 * 1 : 0,//57
            isset($collection->c4) ? $collection->c4 * 2 : 0,//68
            isset($collection->c5) ? $collection->c5 * 5 : 0,//50
            isset($collection->c6) ? $collection->c6 * 10 : 0,//

            isset($collection->b1) ? $collection->b1 * 1 : 0,//20
            isset($collection->b2) ? $collection->b2 * 2 : 0,//8
            isset($collection->b3) ? $collection->b3 * 5 : 0,//155
            isset($collection->b4) ? $collection->b4 * 10 : 0,//130
            isset($collection->b5) ? $collection->b5 * 20 : 0,//100
            isset($collection->b6) ? $collection->b6 * 50 : 0,//50
        ]);
    }
}