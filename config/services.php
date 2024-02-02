<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Third Party Services
    |--------------------------------------------------------------------------
    |
    | This file is for storing the credentials for third party services such
    | as Mailgun, Postmark, AWS and more. This file provides the de facto
    | location for this type of information, allowing packages to have
    | a conventional file to locate the various service credentials.
    |
    */

    'mailgun' => [
        'domain' => env('MAILGUN_DOMAIN'),
        'secret' => env('MAILGUN_SECRET'),
        'endpoint' => env('MAILGUN_ENDPOINT', 'api.mailgun.net'),
        'scheme' => 'https',
    ],

    'postmark' => [
        'token' => env('POSTMARK_TOKEN'),
    ],

    'ses' => [
        'key' => env('AWS_ACCESS_KEY_ID'),
        'secret' => env('AWS_SECRET_ACCESS_KEY'),
        'region' => env('AWS_DEFAULT_REGION', 'us-east-1'),
    ],
    'paypal' => [
        'client_id' => env('AT3Ms135B2T2OANsU05Wd7E1PoSbtlQID1gtwuQNPYev17TCt8hGEtVznPB5vl8aaFmfr6KVg3spXRC1'),
        'secret' => env('EMMeeYjs3OUUGjxsfvRSdeJ6k20Zpi6UhcBWqV1OeXM6t0JGqp8auwwJKtIrxU9w_cL-bkkrt25y4u66'),
        'settings' => [
            'mode' => env('PAYPAL_MODE', 'sandbox'),
            'http.ConnectionTimeOut' => 30,
            'log.LogEnabled' => true,
            'log.FileName' => storage_path() . '/logs/paypal.log',
            'log.LogLevel' => 'ERROR',
        ],

    ],
    'google' => [
        'client_id' => env('868131364631-qubnc19542grebpqlkqs8h5j7v9r2jdk.apps.googleusercontent.com'),
        'client_secret' => env('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'),
        'redirect' => env('GOOGLE_REDIRECT'),
    ],



];
