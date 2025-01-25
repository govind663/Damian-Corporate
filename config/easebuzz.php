<?php

return [
    /*
    |--------------------------------------------------------------------------
    | Easebuzz Merchant Key
    |--------------------------------------------------------------------------
    |
    | Your Easebuzz merchant key provided during onboarding.
    |
    */
    'key' => env('EASEBUZZ_KEY', ''),

    /*
    |--------------------------------------------------------------------------
    | Easebuzz Merchant Salt
    |--------------------------------------------------------------------------
    |
    | Your Easebuzz merchant salt provided during onboarding.
    |
    */
    'salt' => env('EASEBUZZ_SALT', ''),

    /*
    |--------------------------------------------------------------------------
    | Easebuzz Environment
    |--------------------------------------------------------------------------
    |
    | Define whether you're using the Easebuzz 'test' or 'prod' environment.
    |
    */
    'env' => env('EASEBUZZ_ENV', 'test'),
];
