<?php

return [
    'api' => [
        'username' => env('DOTPAY_USERNAME'),
        'password' => env('DOTPAY_PASSWORD'),
        'shop_id' => env('DOTPAY_SHOP_ID'),
        'pin' => env('DOTPAY_PIN'),
        'base_url' => env('DOTPAY_BASE_URL'),
        'url' => env('DOTPAY_URL'),
        'curl' => env('DOTPAY_CURL'),
    ],
    'options' => [
        'recipient' => [
            'company' => 'YourCompany',
            'address' => [
                'street' => '',
                'building_number' => '',
                'postcode' => '',
                'city' => ''
            ]
        ],
    ]
];
