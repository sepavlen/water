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

    public function getStatisticForCurrentDay ()
    {
        return StatisticHelper::getStatisticForCurrentDay($this->repository->getStatisticForCurrentDay(\Auth::id()));
    }

    public function getStatisticForCurrentMonth ()
    {
        return StatisticHelper::getStatisticForCurrentMonth($this->repository->getStatisticForCurrentMonth(\Auth::id()));
    }

    public function getStatisticForLastMonth ()
    {
        return StatisticHelper::getStatisticForLastMonth($this->repository->getStatisticForLastMonth(\Auth::id()));
    }

    public function getStatisticForPeriod ($months)
    {
        return StatisticHelper::getStatisticForPeriod($this->repository->getStatisticForPeriod(\Auth::id(), $months), $months);
    }

    public function getStatisticForAllTime ()
    {
        return $this->repository->getStatisticForAllTime(\Auth::id());
    }
}