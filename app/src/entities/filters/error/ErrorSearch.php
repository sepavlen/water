<?php

namespace App\src\entities\filters\error;

use App\src\entities\Error;
use App\src\filters\BaseSeach;
use App\src\filters\Searchable;

class ErrorSearch implements Searchable
{
    const MODEL = Error::class;
    use BaseSeach;
}