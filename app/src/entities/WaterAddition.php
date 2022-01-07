<?php

namespace App\src\entities;

use App\src\entities\filters\water_addition\WaterAdditionSearch;
use App\User;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;

class WaterAddition extends Model
{
    protected $guarded = [];

    protected $table = 'water_addition';

    public static function tableName ()
    {
        return 'water_addition';
    }

    public function machine ()
    {
        return $this->belongsTo(Machine::class, 'machine_id', 'id');
    }

    public function getBySearch (Request $request) : Builder
    {
        $model = (new WaterAdditionSearch())
            ->apply($request)
            ->with('machine')
            ->orderBy('id', 'desc');

        return $model->whereHas('machine', function ($query){
            if (isDriver()){
                $query->leftJoin('users_machines', function ($join){
                    $join->on('users_machines.machine_id', '=', 'machines.id');
                })
                    ->where('users_machines.user_id', \Auth::id());
            }
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