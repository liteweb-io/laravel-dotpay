<?php

Route::post('dotpay/pay', 'Liteweb\LaravelDotpay\Controllers\DotpayController@pay');
Route::post('/dotpay/callback', 'Liteweb\LaravelDotpay\Controllers\DotpayController@callback');

