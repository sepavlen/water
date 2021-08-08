<?php


namespace App\src\entities\filters\encashment;


use App\src\entities\Encashment;
use App\src\filters\BaseSeach;
use App\src\filters\Searchable;

class EncashmentSearch implements Searchable
{
    const MODEL = Encashment::class;
    use BaseSeach;
}