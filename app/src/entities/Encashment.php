<?php

namespace App\src\entities;

use App\src\entities\filters\encashment\EncashmentSearch;
use App\src\helpers\CollectionHelper;
use App\User;
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
        $model = (new EncashmentSearch())
            ->apply($request)
            ->with('machine')
            ->where('total', '!=', 0)
            ->orderBy('id', 'desc');

        return $model->whereHas('machine', function ($query){
            if (isGeneralPartner()){
                $query->join('users', function ($join) {
                    $join->on('user_id', '=', 'users.id');
                })->whereIn('users.role', [User::ROLE_GENERAL_PARTNER, User::ROLE_PARTNER]);
            }
            if (isDefaultUser())
                $query->where('user_id', \Auth::id());
            return $query;
        });

    }
}
