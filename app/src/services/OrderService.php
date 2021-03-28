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

    public function __construct(OrderRepository $repository, MachineService $machineService)
    {
        $this->repository = $repository;
        $this->machineService = $machineService;
    }

    public function save (Request $request)
    {
        $order = $this->repository->getOrder();
        $this->load($order, $request);
        $this->repository->save($order);
        echo "Заказ создан";
    }

    public function load(Order $order, Request $request)
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
        return $this->repository->save($order);
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
        return $this->getModel()->where(
            'created_at',
            '>',
            Carbon::now()
                ->subDays(30))
            ->selectRaw('machine_id, sum(put_amount) as total')
            ->groupBy('machine_id')
            ->get()
            ->keyBy('machine_id')
            ->toArray();
    }

    public function getSumOrdersForYesterday ()
    {
        return $this->getModel()->where(
            'created_at',
            '>',
            Carbon::yesterday())
            ->where('created_at',
                '<',
                Carbon::today())
            ->selectRaw('machine_id, sum(put_amount) as total')
            ->groupBy('machine_id')
            ->get()
            ->keyBy('machine_id')
            ->toArray();
    }

    public function getSumOrdersToday ()
    {
        return $this->getModel()->where(
            'created_at',
            '>',
            Carbon::today())
            ->selectRaw('machine_id, sum(put_amount) as total')
            ->groupBy('machine_id')
            ->get()
            ->keyBy('machine_id')
            ->toArray();
    }

    public function createOrderStatisticArray ($machines)
    {
        $order_month = $this->getSumOrdersForLastMonth();
        $order_yesterday = $this->getSumOrdersForYesterday();
        $order_today = $this->getSumOrdersToday();

        return OrderHelper::createOrderStatisticArray($machines, $order_month, $order_yesterday, $order_today);
    }

}