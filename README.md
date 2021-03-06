# Laravel Dotpay

[![Build Status](https://travis-ci.org/liteweb/laravel-dotpay.svg?branch=master)](https://travis-ci.org/liteweb/laravel-dotpay)
[![styleci](https://styleci.io/repos/CHANGEME/shield)](https://styleci.io/repos/CHANGEME)
[![Scrutinizer Code Quality](https://scrutinizer-ci.com/g/liteweb/laravel-dotpay/badges/quality-score.png?b=master)](https://scrutinizer-ci.com/g/liteweb/laravel-dotpay/?branch=master)
[![SensioLabsInsight](https://insight.sensiolabs.com/projects/CHANGEME/mini.png)](https://insight.sensiolabs.com/projects/CHANGEME)
[![Coverage Status](https://coveralls.io/repos/github/liteweb/laravel-dotpay/badge.svg?branch=master)](https://coveralls.io/github/liteweb/laravel-dotpay?branch=master)

[![Packagist](https://img.shields.io/packagist/v/liteweb/laravel-dotpay.svg)](https://packagist.org/packages/liteweb/laravel-dotpay)
[![Packagist](https://poser.pugx.org/liteweb/laravel-dotpay/d/total.svg)](https://packagist.org/packages/liteweb/laravel-dotpay)
[![Packagist](https://img.shields.io/packagist/l/liteweb/laravel-dotpay.svg)](https://packagist.org/packages/liteweb/laravel-dotpay)

## Instalacja

Przez composera
```bash
composer require liteweb/laravel-dotpay
```

lub

Dodaj rezpozytorium do composer.json


```json

"require": {
        "liteweb/laravel-dotpay": "dev-master"
    },


"repositories": [
        {
            "type": "vcs",
            "url": "git@github.com:liteweb-io/laravel-dotpay.git"
        }
    ]

```

### Zarejestruj service provider

**Note! This and next step are optional if you use laravel>=5.5 with package
auto discovery feature.**

```php
Liteweb\LaravelDotpay\ServiceProvider::class,
```


### Opublikuj plik konfiguracyjny

```bash
php artisan vendor:publish --provider="Liteweb\LaravelDotpay\ServiceProvider" --tag="config"
```

## Użycie

Predefiniowany routing

```
/dotpay/callback POST
```

Następnie edytuj plik konfiguracyjny i dodaj zmienne do .ENV

```

DOTPAY_USERNAME=
DOTPAY_PASSWORD=
DOTPAY_SHOP_ID=
DOTPAY_PIN=
DOTPAY_BASE_URL=
DOTPAY_URL=
DOTPAY_CURL=
DOTPAY_EXPIRATION_DATETIME=

```



Utwórz metodę która będzie kreowała płatność


Przykład

```php

public function pay(Request $request)
    {
       
         $data = [
            'amount' => '100',
            'currency' => 'PLN',
            'description' => 'Payment for internal_id order',
            'control' => $transaction->id, //ID that dotpay will pong you in the answer
            'language' => 'pl',
            'payer' => [
                'first_name' => 'John',
                'last_name' => 'Smith',
                'email' => 'john.smith@example.com',
                'phone' => '+48123123123'
            ],
            ];

        $response = $this->dotpayApi->createPayment(new Payment($data));
        return $response->getPaymentUrl();
    }

```

Dane do wysłania

```
 {
 "amount" : "100",
 "currency" : "PLN",
 "description" : "Payment for internal_id order",
 "control" : "12345", 
 "language" : "pl",
 "payer" : {
                 "first_name" : "John",
                 "last_name" : "Smith",
                 "email" : "john.smith@example.com",
                 "phone" : "+48123123123"
           }
           
}
```


Event na dotpay callback

```
DotpayCallbackEvent
```





I gotowe

## Security

If you discover any security related issues, please email 
instead of using the issue tracker.

## Credits

- [](https://github.com/liteweb/laravel-dotpay)
- [All contributors](https://github.com/liteweb/laravel-dotpay/graphs/contributors)

This package is bootstrapped with the help of
[melihovv/laravel-package-generator](https://github.com/melihovv/laravel-package-generator).
