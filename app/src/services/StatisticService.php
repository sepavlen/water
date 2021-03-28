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
        return $this->repository->getSumOrdersForLastThirtyDays();
    }

    public function getStatisticLastThirtyDays ()
    {
        return StatisticHelper::getStatisticForLastThirtyDays($this->getSumOrdersForLastThirtyDays());
    }
}