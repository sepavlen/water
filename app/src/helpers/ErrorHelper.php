<?php


namespace App\src\helpers;


use App\src\entities\Machine;
use DateTime;
use Illuminate\Http\Request;

class ErrorHelper
{

    public static function checkErrors ($machines)
    {
//        self::removeErrorIfEmpty();
        if (self::checkMachineTimingErrors($machines)){
            return true;
        }
        if (\Storage::disk()->allFiles('errors')){
            return true;
        }
        return false;
    }

    public static function getErrors ($machine_id)
    {
        $errors = [];
        if (\Storage::disk()->exists('errors/' . $machine_id . '.txt')){
            $errors[] = unserialize(\Storage::get('errors/' . $machine_id . '.txt'));
        }
        return $errors ?: false;
    }

    public static function checkRequestErrors (Request $request)
    {
        if ($request->has('st') && $request->st){
            \Storage::disk()->put('errors/' . $request->n . '.txt', self::getRequestErrors($request->st));
        } else {
            if (\Storage::disk()->exists('errors/' . $request->n . '.txt')){
                \Storage::delete('errors/' . $request->n . '.txt');
            }
        }
    }

    public static function getRequestErrors ($error_code)
    {
        $errors = [];
        if ($error_code){
            if (0x00000001 & $error_code) {
                $errors[] = 'Автомат заблокирован';
            }
            if (0x00100000 & $error_code) {
                $errors[] = 'Ошибка счетчика воды';
            }
            if (0x00000020 & $error_code) {
                $errors[] = 'Уровень воды по верхний датчик';
            }
            if (0x00001000 & $error_code) {
                $errors[] = 'Бокс монетоприемника открыт';
            }
            if (0x00002000 & $error_code) {
                $errors[] = 'Бокс купюроприемника открыт';
            }
            if (0x00003000 & $error_code) {
                $errors[] = 'Маска инкассации';
            }
            if (0x00010000 & $error_code) {
                $errors[] = 'Уровень воды ниже нижнего датчика';
            }
            if (0x00020000 & $error_code) {
                $errors[] = 'Ошибка монетоприемника';
            }
            if (0x00040000 & $error_code) {
                $errors[] = 'Ошибка купюроприемника';
            }
            if (0x00080000 & $error_code) {
                $errors[] = 'Ошибка насоса';
            }
            if (0x00000010 & $error_code) {
                $errors[] = 'Сенсор открытия двери';
            }
            if (0x00200000 & $error_code) {
                $errors[] = 'Ошибка клапана';
            }
            if (!$errors){
                $errors[] = "Неизвестная ошибка - $error_code (" . dec2hex($error_code) . ")";
            }
        }
        return $errors ? serialize($errors) : false;
    }
    
    public static function checkMachineTimingErrors ($machines)
    {
        foreach ($machines as $machine) {
            $start_date = new DateTime($machine->contact_time);
            $since_start = $start_date->diff(new DateTime());
            if (!MachineHelper::getMinutesNotTiming($since_start) || MachineHelper::getMinutesNotTiming($since_start) > ($machine->timing_connect + MachineHelper::ADDING_MINUTES_FOR_CHECK)){
                return true;
            }
        }
        return false;
    }
}