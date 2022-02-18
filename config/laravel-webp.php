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
    | This is a default image processing driver. Available: ['cwebp', 'php-gd']
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

        /*
        |--------------------------------------------------------------------------
        | Cwebp Driver
        |--------------------------------------------------------------------------
        |
        | If you choose cwebp driver it is required to specify the path to the executable.
        |
        */
        'cwebp' => [
            'path' => '/usr/local/bin/cwebp',
        ],

        /*
        |--------------------------------------------------------------------------
        | Cwebp Driver
        |--------------------------------------------------------------------------
        |
        | If you choose PHP GD driver no configuration is necessary.
        |
        */
        'php-gd' => [
            //
        ],
    ],
];
