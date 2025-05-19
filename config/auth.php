<?php

return [

    'defaults' => [
        'guard' => 'web',
        'passwords' => 'users', // GANTI dari 'user' ke 'users'
    ],

    'guards' => [
        'web' => [
            'driver' => 'session',
            'provider' => 'users', // GANTI dari 'user' ke 'users'
        ],

        // Bisa aktifkan jika ingin guard admin juga pakai User model
        // 'admin' => [
        //     'driver' => 'session',
        //     'provider' => 'users',
        // ],
    ],

    'providers' => [
        'users' => [ // GANTI dari 'user' ke 'users'
            'driver' => 'eloquent',
            'model' => App\Models\User::class,
        ],
    ],

    'passwords' => [
        'users' => [ // GANTI dari 'user' ke 'users'
            'provider' => 'users', // Harus sesuai dengan key provider di atas
            'table' => 'password_resets',
            'expire' => 60,
            'throttle' => 60,
        ],
    ],

    'password_timeout' => env('AUTH_PASSWORD_TIMEOUT', 10800),

];
