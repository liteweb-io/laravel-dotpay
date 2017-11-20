<?php

namespace Liteweb\LaravelDotpay;

use Liteweb\Dotpay\DotpayApi;

class ServiceProvider extends \Illuminate\Support\ServiceProvider
{
    const CONFIG_PATH = __DIR__ . '/../config/laravel-dotpay.php';

    public function boot()
    {
        $this->publishes([
            self::CONFIG_PATH => config_path('laravel-dotpay.php'),
        ], 'config');
        $this->loadRoutesFrom(__DIR__.'/routes.php');
    }

    public function register()
    {
        $this->mergeConfigFrom(
            self::CONFIG_PATH,
            'laravel-dotpay'
        );
        $this->app->singleton(DotpayApi::class, function ($app) {
            return new DotpayApi($app['config']['laravel-dotpay']['api']);
        });
    }
}
