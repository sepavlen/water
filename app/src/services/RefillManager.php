<?php

namespace App\src\services;

use App\src\entities\Refill;
use Illuminate\Http\Request;

class RefillManager
{
    public static function model ()
    {
        return new Refill;
    }

    protected static function query ()
    {
        return self::model()->newQuery();
    }

    public static function create (Request $request, $order_id)
    {
        $model = self::model();
        $model->fill($request->except('_token'));
        $model->order_id = $order_id;
        $model->save();
        return $model;
    }

    public static function getByOrderId ($order_id)
    {
        return self::query()
            ->where('order_id', $order_id)
            ->first();
    }

    public static function getNotPayedByMachineId ($machine_id)
    {
        return self::query()
            ->where('machine_id', $machine_id)
            ->where('status', Refill::STATUS_PAYED)
            ->where('status_payed', Refill::STATUS_NEW)
            ->first() ?: self::model();
    }

    public static function success (Request $request)
    {
        if (!$request->orderReference || !$refill = self::getByOrderId($request->orderReference))
            abort(404, 'Виникла помилка');
        $refill->status = Refill::STATUS_PAYED;
        $refill->datetime_payed = date('Y-m-d H:i:s', time());
        $refill->callback = json_encode($request->all());
        $refill->save();
    }

    public static function paid (Request $request)
    {
        if (!$refill = self::getNotPayedByMachineId($request->n))
            throw new \Exception('Refill not found', '404');
        $refill->status_payed = Refill::STATUS_PAYED;
        $refill->datetime_st_payed = date('Y-m-d H:i:s', time());
        $refill->save();
    }
}