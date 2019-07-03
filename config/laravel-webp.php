<?php

return [
    /*
    |--------------------------------------------------------------------------
    | Default Quality
    |--------------------------------------------------------------------------
    |
    | This is a default quality unless you provide while generation of the WebP
    |
    */

    'default_quality' => 70,

    /*
    |--------------------------------------------------------------------------
    | Default Driver
    |--------------------------------------------------------------------------
    |
    | This is a default image processing driver. Available: ['php-gd', 'cwebp']
    |
    */

    'default_driver' => 'php-gd',

    /*
    |--------------------------------------------------------------------------
    | Drivers
    |--------------------------------------------------------------------------
    |
    | Available drivers which can be selected
    |
    */

    'drivers' => [

        'php-gd' => [],

        'cwebp' => [
            'path' => '/usr/local/bin/cwebp',
        ],

    ],
];
