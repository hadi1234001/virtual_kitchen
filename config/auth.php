<?php

return [

    'defaults' => [
        'guard' => 'api_admins', // ممكن تغييره لاحقاً
        'passwords' => 'admins',
    ],

    'guards' => [
        // لكل نوع مستخدم Guard خاص به
        'api_admins' => [
            'driver' => 'jwt',
            'provider' => 'admins',
        ],
        'api_chefs' => [
            'driver' => 'jwt',
            'provider' => 'chefs',
        ],
        'api_clients' => [
            'driver' => 'jwt',
            'provider' => 'clients',
        ],
        'api_distributors' => [
            'driver' => 'jwt',
            'provider' => 'distributors',
        ],
    ],

    'providers' => [
        'admins' => [
            'driver' => 'eloquent',
            'model' => App\Models\Admin::class,
        ],
        'chefs' => [
            'driver' => 'eloquent',
            'model' => App\Models\Chef::class,
        ],
        'clients' => [
            'driver' => 'eloquent',
            'model' => App\Models\Client::class,
        ],
        'distributors' => [
            'driver' => 'eloquent',
            'model' => App\Models\Distributor::class,
        ],
    ],

    'passwords' => [
        'admins' => [
            'provider' => 'admins',
            'table' => 'password_reset_tokens',
            'expire' => 60,
            'throttle' => 60,
        ],
        'chefs' => [
            'provider' => 'chefs',
            'table' => 'password_reset_tokens',
            'expire' => 60,
            'throttle' => 60,
        ],
        'clients' => [
            'provider' => 'clients',
            'table' => 'password_reset_tokens',
            'expire' => 60,
            'throttle' => 60,
        ],
        'distributors' => [
            'provider' => 'distributors',
            'table' => 'password_reset_tokens',
            'expire' => 60,
            'throttle' => 60,
        ],
    ],

    'password_timeout' => env('AUTH_PASSWORD_TIMEOUT', 10800),
];
