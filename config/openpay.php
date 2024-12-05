<?php
return [
    'id' => env('OPENPAY_ID'),
    'private_key' => env('OPENPAY_PRIVATE_KEY'),
    'public_key' => env('OPENPAY_PUBLIC_KEY'),
    'mode' => env('OPENPAY_MODE', 'sandbox'), // sandbox o production
    'public_ip' => env('OPENPAY_PUBLIC_IP', '127.0.0.1'),
    'country_code' => env('OPENPAY_PUBLIC_IP', 'MX'),
];
