<?php

namespace App\src\entities\filters\water_addition;

use App\src\entities\WaterAddition;
use App\src\filters\BaseSeach;
use App\src\filters\Searchable;

class WaterAdditionSearch implements Searchable
{
    const MODEL = WaterAddition::class;
    use BaseSeach;
}