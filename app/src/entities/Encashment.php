<?php

namespace App\src\entities;

use App\src\entities\filters\encashment\EncashmentSearch;
use App\src\helpers\CollectionHelper;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Http\Request;

class Encashment extends Model
{
    protected $guarded = [];

    protected $table = 'encashment';

    public static function tableName ()
    {
        return 'encashment';
    }

    public function machine ()
    {
        return $this->belongsTo(Machine::class);
    }

    public function getSum ()
    {
        return CollectionHelper::getTotalSum($this);
    }

    public function getBySearch (Request $request) : Builder
    {
        return (new EncashmentSearch())->apply($request)->orderBy('id', 'desc');
    }
}
