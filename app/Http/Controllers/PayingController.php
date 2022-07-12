<?php

namespace App\Http\Controllers;

use App\src\services\MachineService;
use App\src\services\RefillManager;
use App\src\services\WebForPayService;
use Illuminate\Http\Request;
use Maksa988\WayForPay\Collection\ProductCollection;
use Maksa988\WayForPay\Domain\Client;
use Maksa988\WayForPay\Facades\WayForPay;
use WayForPay\SDK\Domain\Product;
use WayForPay\SDK\Domain\Transaction;

class PayingController extends Controller
{
    public $machineService;
    public function __construct(MachineService $machineService)
    {
        $this->machineService = $machineService;
    }

    public function index (Request $request)
    {
        if (!$request->n || !$machine = $this->machineService->getMachineByUniqueNumber($request->n))
            abort(404);
        return view('paying.paying', compact('machine'));
    }

    public function pay (Request $request)
    {
        $service = WebForPayService::init($request);
        $form = $service->getAsString();
        RefillManager::create($request, $service->getData()['orderReference']);

        return view('paying.pay', compact('form'));
    }

    /*public function callback(Request $request)
    {
        return WayForPay::handleServiceUrl($request, function (Transaction $transaction, $success) {
            if($transaction->getReason()->isOK()) {
                return $success();
            }
            return response()->json(['error' => $transaction->getReason()->getMessage()]);
        });
    }*/

    public function success(Request $request)
    {
        if ($request->transactionStatus != 'Approved'){
            return view('paying.error');
        } else {
            RefillManager::success($request);
            return view('paying.success');
        }
    }
}
