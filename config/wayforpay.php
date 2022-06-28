<?php

return [
    /*
     * Test mode for using test credentials
     */
    'testMode' => env("WAYFORPAY_TEST", true),

    /*
     * Merchant domain
     */
    'merchantDomain' => env('WAYFORPAY_DOMAIN', 'vendingmachine.com.ua'),

    /*
     * Merchant Account ID
     */
    'merchantAccount' => env('WAYFORPAY_ACCOUNT', 'zdorovenka_kh_ua'),

    /*
     * Merchant Secret key
     */
    'merchantSecretKey' => env('WAYFORPAY_SECRET_KEY', 'cfe2c7acf00abebe0328ed5880072d97d7f2bda0'),
];
