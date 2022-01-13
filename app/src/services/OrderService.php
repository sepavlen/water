<?php


namespace App\src\services;

use App\src\entities\Order;
use App\src\helpers\OrderHelper;
use App\src\repositories\OrderRepository;
use Carbon\Carbon;
use Illuminate\Http\Request;

class OrderService
{
    private $repository;
    private $machineService;
    private $waterAddition;

    public function __construct(OrderRepository $repository, MachineService $machineService, WaterAdditionService $waterAddition)
    {
        $this->repository = $repository;
        $this->machineService = $machineService;
        $this->waterAddition = $waterAddition;
    }

    public function save (Request $request)
    {
        if ($this->isNotDuplicateOrder($request)){
            $order = $this->repository->getOrder();
            $this->load($order, $request);
            $this->repository->save($order);
        }

        //$this->repository->save($order);
        echo "OK; ";
    }
    
    public function isNotDuplicateOrder (Request $request)
    {
        $order = $this->repository->getLastOrderByUniqueNumber($request->n);
        if (!$order){
            if (!$this->machineService->getMachineByUniqueNumber($request->n)){
                $this->machineService->createDefaultMachine($request);
            }
            return true;
        }
        return $this->checkDuplicate($request, $order);
    }

    public function checkDuplicate (Request $request, Order $order)
    {
        if ($this->isDifferentAmount($request, $order))
            return true;
        return $this->timeIsMoreThanSpecified($order);
    }
    
    protected function isDifferentAmount (Request $request, Order $order)
    {
        return $order->put_amount != $request->sp || $order->sold_amount != $request->sn;
    }
    protected function timeIsMoreThanSpecified (Order $order)
    {
        return Carbon::now()->diffInMinutes(Carbon::parse($order->created_at)) > Order::WAIT_DUPLICATE_MIN;
    }

    public function load(Order &$order, Request $request)
    {
        if (!$machine = $this->machineService->getMachineByUniqueNumber($request->n)){
            $machine = $this->machineService->createDefaultMachine($request);
        }
        $order->machine_id = $machine->id;
        $order->machine_unique_number = $request->n;
        $order->put_amount = $request->sp;
        $order->sold_amount = $request->sn;
        $order->water_paid = $request->kp;
        $order->water_given = $request->kn;
    }

    public function getOrders ()
    {
        return $this->repository->getAllOrders();
    }

    public function getModel ()
    {
        return $this->repository->getOrder();
    }

    public function getSumOrdersForLastMonth ()
    {
        return $this->repository->getSumOrdersForLastMonth();
    }

    public function getSumOrdersForYesterday ()
    {
        return $this->repository->getSumOrdersForYesterday();
    }

    public function getSumOrdersToday ()
    {
        return $this->repository->getSumOrdersToday();
    }

    public function getLostWaterAdded ()
    {
        return $this->waterAddition->getLostWaterAdded();
    }

    public function getOrderStatisticArray ($machines)
    {
        $order_month = $this->getSumOrdersForLastMonth();
        $order_yesterday = $this->getSumOrdersForYesterday();
        $order_today = $this->getSumOrdersToday();
        $last_water_added = $this->getLostWaterAdded();

        return OrderHelper::getOrderStatisticArray($machines, $order_month, $order_yesterday, $order_today, $last_water_added);
    }

}