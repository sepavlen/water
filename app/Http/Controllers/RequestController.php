<?php

namespace App\Http\Controllers;

use App\src\entities\Refill;
use App\src\helpers\ErrorHelper;
use App\src\services\EncashmentService;
use App\src\services\ErrorService;
use App\src\services\MachineService;
use App\src\services\OrderService;
use App\src\services\RefillManager;
use Illuminate\Http\Request;

class RequestController extends Controller
{
    /**
     * @var MachineService
     */
    public $machineService;
    /**
     * @var OrderService
     */
    public $orderService;
    /**
     * @var EncashmentService
     */
    public $encashmentService;
    /**
     * @var ErrorService
     */
    public $errorService;

    public function __construct(
        MachineService    $machineService,
        OrderService      $orderService,
        EncashmentService $encashmentService,
        ErrorService      $errorService
    )
    {
        $this->machineService = $machineService;
        $this->orderService = $orderService;
        $this->encashmentService = $encashmentService;
        $this->errorService = $errorService;
    }

    public function index(Request $request)
    {
        if (!$request->has('com') || !$request->has('n')) {
            abort(404);
        }
        $refill = $request->com != 7 ? RefillManager::getNotPayedByMachineId($request->n) : RefillManager::model();

        switch ($request->com){
            case 1: return $this->com1($request, $refill);
            case 2: return $this->com2($request, $refill);
            case 3: return $this->com3($request, $refill);
            case 7: return $this->com7($request);
        }
        abort(404);
    }

    private function com1 (Request $request, Refill $refill)
    {
        try {
            $this->errorService->checkRequestErrors($request);
            $this->machineService->updateOrCreateDefaultMachine($request);
            return $this->response($refill);
        } catch (\Exception $e) {
            return response()->json(['error' => $e->getMessage()]);
        }
    }

    private function com2 (Request $request, Refill $refill)
    {
        try {
            $this->orderService->save($request);
            return $this->response($refill);
        } catch (\Exception $e) {
            return response()->json(['error' => $e->getMessage()]);
        }
    }

    private function com3 (Request $request, Refill $refill){
        try {
            $this->encashmentService->save($request);
            return $this->response($refill);
        } catch (\Exception $e) {
            return response()->json(['error' => $e->getMessage()]);
        }
    }

    private function com7 (Request $request){
        try {
            RefillManager::paid($request);
            return response()->json(['success' => 'Ok']);
        } catch (\Exception $e) {
            return response()->json(['error' => $e->getMessage()]);
        }
    }

    private function response (Refill $refill)
    {
        if ($refill->exists){
            return response()->json([
                'success' => 'Ok',
                'order_id' => $refill->order_id,
                'amount' => (float)$refill->amount * 100,
            ]);
        }
        return response()->json(['success' => 'Ok']);
    }
}
