<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Third Party Services
    |--------------------------------------------------------------------------
    |
    | This file is for storing the credentials for third party services such
    | as Stripe, Mailgun, SparkPost and others. This file provides a sane
    | default location for this type of information, allowing packages
    | to have a conventional place to find your various credentials.
    |
    */

    'mailgun' => [
        'domain' => env('MAILGUN_DOMAIN'),
        'secret' => env('MAILGUN_SECRET'),
    ],

    'ses' => [
        'key' => env('SES_KEY'),
        'secret' => env('SES_SECRET'),
        'region' => 'us-east-1',
    ],

    'sparkpost' => [
        'secret' => env('SPARKPOST_SECRET'),
    ],

    'stripe' => [
        'model' => App\User::class,
        'key' => env('STRIPE_KEY'),
        'secret' => env('STRIPE_SECRET'),
    ],
    'facebook' => [
        'client_id' => '1742697746033387',
        'client_secret' => '83c6daa8c8eff664b73460c5d9fcfa42',
        'redirect' => 'http://localhost:8000/login/facebook/callback',
    ],
    'google' => [
        'client_id' => '326760990920-jmqo3ooa38mpoh3ih3tanqsgo63ujboi.apps.googleusercontent.com',
        'client_secret' => 'XCv_kcXIY0mOUDLLCYsRKGK2',
        'redirect' => 'http://localhost:8000/login/google/callback',
    ],
    'twitter' => [
        'client_id' => 'r64bWF3Sh6KBZo3YcBiQ2dF0z',
        'client_secret' => 'L2GsQlIwJ4OLPHRk3O1HpO0QR9kU1nFhL2X7mPYVDuu6jRMItA',
        'redirect' => 'http://127.0.0.1:8000/login/twitter/callback',
    ],
    'github' => [
        'client_id' => 'f65c4e8f3f666bd6647f',
        'client_secret' => '00dfd329b8f3a333bdb5e2789d885545c97e731a',
        'redirect' => 'http://localhost:8000/login/github/callback',
    ],
    'linkedin' => [
        'client_id' => '8111ueh7o6didy',
        'client_secret' => 'VvYlZGErllZnIYrn',
        'redirect' => 'http://localhost:8000/login/linkedin/callback',
    ],
];
