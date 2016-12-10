<?php

return [

    'debug' => env('APP_DEBUG', true),

    /*
    |--------------------------------------------------------------------------
    | Encryption Key
    |--------------------------------------------------------------------------
    |
    | This key is used by the Illuminate encrypter service and should be set
    | to a random, 32 character string, otherwise these encrypted strings
    | will not be safe. Please do this before deploying an application!
    |
    */

    'key' => env('APP_KEY', 'eg32Sd__a#S%DfaE#-EG^)sFe(feagT#g'),

    'cipher' => 'AES-256-CBC',

    /*
    |--------------------------------------------------------------------------
    | Application Locale Configuration
    |--------------------------------------------------------------------------
    |
    | The application locale determines the default locale that will be used
    | by the translation service provider. You are free to set this value
    | to any of the locales which will be supported by the application.
    |
    */
    'locale' => env('APP_LOCALE', 'en'),
    /*
    |--------------------------------------------------------------------------
    | Application Fallback Locale
    |--------------------------------------------------------------------------
    |
    | The fallback locale determines the locale to use when the current one
    | is not available. You may change the value to correspond to any of
    | the language folders that are provided through your application.
    |
    */
    'fallback_locale' => env('APP_FALLBACK_LOCALE', 'en'),

    /*
    |--------------------------------------------------------------------------
    | 用户密码的 hash 串
    |--------------------------------------------------------------------------
    |
    */
    'password_hash_prefix' => 'S*z-#)_o+0$2#_%s_^aFqA7=SD2/Sf',

    /*
    |--------------------------------------------------------------------------
    | 默认登陆成功进入的页面
    |--------------------------------------------------------------------------
    |
    */
    'default_portal' => '/manager/list',
];
