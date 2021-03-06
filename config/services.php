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
        'key'    => env('SES_KEY'),
        'secret' => env('SES_SECRET'),
        'region' => 'us-east-1',
    ],

    'sparkpost' => [
        'secret' => env('SPARKPOST_SECRET'),
    ],

    'stripe'   => [
        'model'  => App\User::class,
        'key'    => env('STRIPE_KEY'),
        'secret' => env('STRIPE_SECRET'),
    ],
    'ideamart' => [
        'application' => 'APP000001',
        'password'    => 'password',
        'server'=>'http://localhost:7000/sms/send/'
    ],
    'facebook' => [
        'page-token' => env('FACEBOOK_PAGE_TOKEN', 'EAAJZCQWjqNYIBAP7HzpPOChsEPYomINIAGrG5mq1YeFH6SGVJANnhj4d5xqLRUEd1dc0rIEPVDIFuQupZCzRJotAnMdLj5xmJF9OQWlzMFd9xRGxDVobvCrMryiBGCQ80WsUrtUeLRpr65Sh8XINc5wQXBg82tJtOJoop6hAZDZD')
    ],

];
