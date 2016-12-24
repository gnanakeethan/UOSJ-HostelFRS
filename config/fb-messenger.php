<?php
use App\Engine\FacebookHandler;

return [
    'debug'        => env('APP_DEBUG', FALSE),
    'verify_token' => env('MESSENGER_VERIFY_TOKEN'),
    'app_token'    => env('MESSENGER_APP_TOKEN'),
    'auto_typing'  => TRUE,
    'handlers'     => [
        FacebookHandler::class,
    ],
    'custom_url'   => '/hooked',
    'postbacks'    => [],
];
