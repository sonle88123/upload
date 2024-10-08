<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Application Name
    |--------------------------------------------------------------------------
    |
    | This value is the name of your application, which will be used when the
    | framework needs to place the application's name in a notification or
    | other UI elements where an application name needs to be displayed.
    |
    */

    'name' => env('APP_NAME', 'Laravel'),

    /*
    |--------------------------------------------------------------------------
    | Application Environment
    |--------------------------------------------------------------------------
    |
    | This value determines the "environment" your application is currently
    | running in. This may determine how you prefer to configure various
    | services the application utilizes. Set this in your ".env" file.
    |
    */

    'env' => env('APP_ENV', 'production'),

    /*
    |--------------------------------------------------------------------------
    | Application Debug Mode
    |--------------------------------------------------------------------------
    |
    | When your application is in debug mode, detailed error messages with
    | stack traces will be shown on every error that occurs within your
    | application. If disabled, a simple generic error page is shown.
    |
    */

    'debug' => (bool) env('APP_DEBUG', false),

    /*
    |--------------------------------------------------------------------------
    | Application URL
    |--------------------------------------------------------------------------
    |
    | This URL is used by the console to properly generate URLs when using
    | the Artisan command line tool. You should set this to the root of
    | the application so that it's available within Artisan commands.
    |
    */

    'url' => env('APP_URL', 'http://localhost'),

    /*
    |--------------------------------------------------------------------------
    | Application Timezone
    |--------------------------------------------------------------------------
    |
    | Here you may specify the default timezone for your application, which
    | will be used by the PHP date and date-time functions. The timezone
    | is set to "UTC" by default as it is suitable for most use cases.
    |
    */

    'timezone' => env('APP_TIMEZONE', 'UTC'),

    /*
    |--------------------------------------------------------------------------
    | Application Locale Configuration
    |--------------------------------------------------------------------------
    |
    | The application locale determines the default locale that will be used
    | by Laravel's translation / localization methods. This option can be
    | set to any locale for which you plan to have translation strings.
    |
    */

    'locale' => env('APP_LOCALE', 'en'),

    'fallback_locale' => env('APP_FALLBACK_LOCALE', 'en'),

    'faker_locale' => env('APP_FAKER_LOCALE', 'en_US'),

    /*
    |--------------------------------------------------------------------------
    | Encryption Key
    |--------------------------------------------------------------------------
    |
    | This key is utilized by Laravel's encryption services and should be set
    | to a random, 32 character string to ensure that all encrypted values
    | are secure. You should do this prior to deploying the application.
    |
    */

    'cipher' => 'AES-256-CBC',

    'key' => env('APP_KEY'),

    'previous_keys' => [
        ...array_filter(
            explode(',', env('APP_PREVIOUS_KEYS', ''))
        ),
    ],

    /*
    |--------------------------------------------------------------------------
    | Maintenance Mode Driver
    |--------------------------------------------------------------------------
    |
    | These configuration options determine the driver used to determine and
    | manage Laravel's "maintenance mode" status. The "cache" driver will
    | allow maintenance mode to be controlled across multiple machines.
    |
    | Supported drivers: "file", "cache"
    |
    */

    'maintenance' => [
        'driver' => env('APP_MAINTENANCE_DRIVER', 'file'),
        'store' => env('APP_MAINTENANCE_STORE', 'database'),
    ],

    'openai' => env('OPENAI'),
    'leoai' => env('LEOAI'),

    'promptchan' => env('PROMPTCHAN'),
    'promptchan_0' => env('PROMPTCHAN_0'),
    'promptchan_1' => env('PROMPTCHAN_1'),
    'promptchan_2' => env('PROMPTCHAN_2'),
    'promptchan_3' => env('PROMPTCHAN_3'),
    'promptchan_4' => env('PROMPTCHAN_4'),
    'promptchan_5' => env('PROMPTCHAN_5'),
    'promptchan_6' => env('PROMPTCHAN_6'),
    'promptchan_7' => env('PROMPTCHAN_7'),
    'promptchan_8' => env('PROMPTCHAN_8'),
    'promptchan_9' => env('PROMPTCHAN_9'),
    'promptchan_10' => env('PROMPTCHAN_10'),
    'promptchan_11' => env('PROMPTCHAN_11'),
    'promptchan_12' => env('PROMPTCHAN_12'),
    'promptchan_13' => env('PROMPTCHAN_13'),
    'promptchan_14' => env('PROMPTCHAN_14'),
    'promptchan_15' => env('PROMPTCHAN_15'),
    'promptchan_16' => env('PROMPTCHAN_16'),
    'promptchan_17' => env('PROMPTCHAN_17'),
    'promptchan_18' => env('PROMPTCHAN_18'),
    'promptchan_19' => env('PROMPTCHAN_19'),
    'promptchan_20' => env('PROMPTCHAN_20'),
    'promptchan_21' => env('PROMPTCHAN_21'),

];
