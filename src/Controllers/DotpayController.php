<?php

namespace Liteweb\LaravelDotpay\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Liteweb\Dotpay\DotpayApi;
use Liteweb\Dotpay\Models\DotpayCallback;
use Liteweb\Dotpay\Models\Payment;
use Liteweb\LaravelDotpay\Events\DotpayCallbackEvent;

class DotpayController extends Controller
{
    public function callback(Request $request, DotpayApi $dotpayApi)
    {
        $callback = new DotpayCallback($request->all());
        if ($dotpayApi->verifyCallback($callback)) {
            event(new DotpayCallbackEvent($callback));
        }
        return new Response('OK');
    }
}