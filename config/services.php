<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Third Party Services
    |--------------------------------------------------------------------------
    |
    | This file is for storing the credentials for third party services such
    | as Stripe, Mailgun, Mandrill, and others. This file provides a sane
    | default location for this type of information, allowing packages
    | to have a conventional place to find your various credentials.
    |
    */

    'mailgun' => [
        'domain' => '',
        'secret' => '',
    ],

    'mandrill' => [
        'secret' => '',
    ],

    'ses' => [
        'key' => '',
        'secret' => '',
        'region' => 'us-east-1',
    ],

    'stripe' => [
        'model'  => App\User::class,
        'key' => '',
        'secret' => '',
    ],
    'paypal' => [
        'username'  => env('PAYPAL_USERNAME',''),
        'password'  => env('PAYPAL_PASSWORD',''),
        'signature' => env('PAYPAL_SIGNATURE',''),
    ],
    'github' => [
        'client_id'     => env('GITHUB_CLIENT',''),
        'client_secret' => env('GITHUB_SECRET',''),
        'redirect'      => 'http://localhost:8000/auth/github/callback',
    ],
];
