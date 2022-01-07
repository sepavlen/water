<?php

namespace App\src\entities;

use App\src\entities\filters\error\ErrorSearch;
use App\User;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;

class Error extends Model
{
    protected $guarded = [];
    protected $table = 'error';

    const STATUS_ACTIVE = 1,
        STATUS_INACTIVE = 2;

    public static function tableName ()
    {
        return 'error';
    }

    public function machine ()
    {
        return $this->belongsTo(Machine::class, 'machine_number', 'unique_number');
    }

    public function getBySearch (Request $request) : Builder
    {
        $model = (new ErrorSearch())
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
