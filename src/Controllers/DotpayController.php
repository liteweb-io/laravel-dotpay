<?php

namespace Liteweb\LaravelDotpay\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Liteweb\Dotpay\DotpayApi;
use Liteweb\Dotpay\Models\DotpayCallback;
use Liteweb\Dotpay\Models\Payment;
use Liteweb\LaravelDotpay\Events\DotpayCallbackEvent;
use Liteweb\LaravelDotpay\Events\DotpayPaymentEvent;

class DotpayController extends Controller
{

    public function callback(Request $request)
    {
        $config = config('laravel-dotpay.api');

        $dotpayApi = new DotpayApi($config);

        $callback = new DotpayCallback($request->all());
        if ($dotpayApi->verifyCallback($callback)) {
            event(new DotpayCallbackEvent($callback));
        }
        return new Response('OK');
    }

    public function pay(Request $request)
    {


        $this->validate($request, [
            'amount' => 'required',
            'currency' => 'required',
            'description' => '',
            'control' => 'required',
            'language' => 'required',
            'ch_lock' => '',
            'expiration_datetime' => 'required',
            'payer' => 'required'
        ]);

        $data = [
            'amount' => $request->amount,
            'currency' => $request->currency,
            'description' => $request->description ?? '',
            'control' => $request->control, //ID that dotpay will pong you in the answer
            'language' => $request->language,
            'ch_lock' => $request->ch_lock ?? '',
            'url' => config('laravel-dotpay.options.url'),
            'urlc' => config('laravel-dotpay.options.curl'),
            'expiration_datetime' => $request->expiration_datetime ?? '',
            'payer' => $request->payer,
            'recipient' => config('laravel-dotpay.options.recipient')
        ];




        $config = config('laravel-dotpay.api');
        $dotpayApi = new DotpayApi($config);
        $response = $dotpayApi->createPayment(new Payment($data));

        event(new DotpayPaymentEvent(new Payment($data)));

        return redirect()->to($response->getPaymentUrl());
    }
}