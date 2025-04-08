<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Authentication Defaults
    |--------------------------------------------------------------------------
    */
    'defaults' => [
        'guard' => 'web', // default guard
        'passwords' => 'user', // default password reset
    ],

    /*
    |--------------------------------------------------------------------------
    | Authentication Guards
    |--------------------------------------------------------------------------
    */
    'guards' => [
        'web' => [ // Guard default, bisa kamu pakai buat admin juga
            'driver' => 'session',
            'provider' => 'user',
        ],

        // Jika ingin pisahkan login admin (tapi tetap pakai model User), aktifkan ini:
        // 'admin' => [
        //     'driver' => 'session',
        //     'provider' => 'users',
        // ],
    ],

    /*
    |--------------------------------------------------------------------------
    | User Providers
    |--------------------------------------------------------------------------
    */
    'providers' => [
        'user' => [
            'driver' => 'eloquent',
            'model' => App\Models\User::class, // pakai model User
        ],
    ],

    /*
    |--------------------------------------------------------------------------
    | Resetting Passwords
    |--------------------------------------------------------------------------
    */
    'password' => [
        'user' => [
            'provider' => 'users',
            'table' => env('AUTH_PASSWORD_RESET_TOKEN_TABLE', 'password_reset_tokens'),
            'expire' => 60,
            'throttle' => 60,
        ],
    ],

    /*
    |--------------------------------------------------------------------------
    | Password Confirmation Timeout
    |--------------------------------------------------------------------------
    */
    'password_timeout' => env('AUTH_PASSWORD_TIMEOUT', 10800),

];
