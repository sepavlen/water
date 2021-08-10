<?php


namespace App\src\services;


use App\src\helpers\StatisticHelper;
use App\src\repositories\StatisticRepository;

class StatisticService
{
    public $repository;

    public function __construct(StatisticRepository $repository)
    {
        $this->repository = $repository;
    }

    public function getSumOrdersForLastThirtyDays ()
    {
        return $this->repository->getSumOrdersForLastThirtyDays(\Auth::id());
    }

    public function getStatisticLastThirtyDays ()
    {
        return StatisticHelper::getStatisticForLastThirtyDays($this->getSumOrdersForLastThirtyDays());
    }

    public function getTotalProfitToday ()
    {
        return $this->repository->getTotalProfitToday(\Auth::id());
    }

    public function getTotalProfitMonth ()
    {
        return $this->repository->getTotalProfitMonth(\Auth::id());
    }

    public function getTotalProfitYear ()
    {
        return $this->repository->getTotalProfitYear(\Auth::id());
    }

    public function getTotalProfitAllTime ()
    {
        return $this->repository->getTotalProfitAllTime(\Auth::id());
    }

    public function getStatisticForCurrentDay ($machine_id = false)
    {
        return StatisticHelper::getStatisticForCurrentDay($this->repository->getStatisticForCurrentDay(\Auth::id(), $machine_id));
    }

    public function getStatisticForCurrentMonth ($machine_id= false)
    {
        return StatisticHelper::getStatisticForCurrentMonth($this->repository->getStatisticForCurrentMonth(\Auth::id(), $machine_id));
    }

    public function getStatisticForLastMonth ($machine_id = false)
    {
        return StatisticHelper::getStatisticForLastMonth($this->repository->getStatisticForLastMonth(\Auth::id(), $machine_id));
    }

    public function getStatisticForPeriod ($months, $machine_id = false)
    {
        return StatisticHelper::getStatisticForPeriod($this->repository->getStatisticForPeriod(\Auth::id(), $months, $machine_id), $months);
    }

    public function getStatisticBetweenDates ($dateFrom, $dateTo, $machine_ids = false)
    {
        return $this->repository->getStatisticBetweenDates($dateFrom, $dateTo, $machine_ids);
    }

    public function getStatisticForAllTime ($machine_id = false)
    {
        return $this->repository->getStatisticForAllTime(\Auth::id(), $machine_id);
    }
}