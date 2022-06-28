<?php

namespace App\src\services;

use Illuminate\Http\Request;
use Maksa988\WayForPay\Collection\ProductCollection;
use Maksa988\WayForPay\Domain\Client;
use Maksa988\WayForPay\Facades\WayForPay;
use WayForPay\SDK\Domain\Product;

class WebForPayService
{
    public static function init (Request $request)
    {
        $client = new Client('', '', '');
        $products = new ProductCollection([
            new Product('Покупка', $request->amount, 1),
        ]);
        $order_id = \Str::random(50);

        return  WayForPay::purchase(
            $order_id,
            $request->amount,
            $client,
            $products,
            'UAH',
            now(),
            'UA',
            null,
            route('paying.success'),
            'https://www.vendingmachine.com.ua/callback/'
        );
    }
}