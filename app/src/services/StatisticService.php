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

    public function getProfitToday ()
    {
        return $this->repository->getProfitToday(\Auth::id());
    }

    public function getCountOrdersToday ()
    {
        return $this->repository->getCountOrdersToday(\Auth::id());
    }

    public function getProfitDailyIncomeWeekAgo ()
    {
        return $this->repository->getProfitDailyIncomeWeekAgo(\Auth::id());
    }

    public function getProfitWeek ()
    {
        return $this->repository->getProfitWeek(\Auth::id());
    }

    public function getProfitWeekAgo ()
    {
        return $this->repository->getProfitWeekAgo(\Auth::id());
    }

    public function getDailyCountOrdersWeekAgo ()
    {
        return $this->repository->getDailyCountOrdersWeekAgo(\Auth::id());
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

    public function getStatisticOneMachineBetweenDates ($dateFrom, $dateTo, $user_id, $machine_id)
    {
        return $this->repository->getStatisticOneMachineBetweenDates($dateFrom, $dateTo, $user_id, $machine_id);
    }

    public function getStatisticForAllTime ($machine_id = false)
    {
        return $this->repository->getStatisticForAllTime(\Auth::id(), $machine_id);
    }
}