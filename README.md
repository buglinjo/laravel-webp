## WebP (.webp) comes to Laravel

[![Latest Version on Packagist][ico-version]][link-packagist]
[![Software License][ico-license]](LICENSE.md)
[![Total Downloads][ico-downloads]][link-downloads]

## About

WebP is a modern image format that provides superior lossless and lossy compression for images on the web. Using WebP,
webmasters and web developers can create smaller, richer images that make the web faster.

WebP lossless images are 26% smaller in size compared to PNGs. WebP lossy images are 25-34% smaller than comparable JPEG
images at equivalent SSIM quality index.

Lossless WebP supports transparency (also known as alpha channel) at a cost of just 22% additional bytes. For cases when
lossy RGB compression is acceptable, lossy WebP also supports transparency, typically providing 3× smaller file sizes
compared to PNG.

`cwebp` compresses an image using the WebP format. Input format can be either `PNG`, `JPEG`, `TIFF`, `WebP` or
raw `Y'CbCr` samples.

## Before Installation

### New Driver Is Available: `php-gd` 

Currently, supports 2 drivers:
* `php-gd` - Only needs `gd` - PHP extension to be installed
* `cwebp` - uses Google native `cwebp` cli command

Note: If you choose to use cwebp driver you will need to install WebP before installing this package.\
For more information you can visit this [page](https://developers.google.com/speed/webp/)

## Install

Via Composer

```bash
$ composer require buglinjo/laravel-webp
```

#### For Laravel <= 5.4

After updating composer, add the ServiceProvider to the providers array in config/app.php

```php
Buglinjo\LaravelWebp\WebpServiceProvider::class,
```

You can use the facade for shorter code. Add this to your aliases:

```php
'Webp' => Buglinjo\LaravelWebp\Facades\Webp::class,
```

#### Publish config file

You will need to publish config file to add `cwebp` global path.

```
php artisan vendor:publish --provider="Buglinjo\LaravelWebp\WebpServiceProvider" --tag=config
```

In `config/laravel-webp.php` config file you should set `cwebp` global path.

```php
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
```

## Usage

```php
Webp::make(<UploadedFile image>)->save(<output path>, <quality :optional>);
```

Note: `UploadedFile` class instance is created when file is retrieved using laravel request.

Example:

```php
    $webp = Webp::make($request->file('image'));

    if ($webp->save(public_path('output.webp'))) {
        // File is saved successfully
    }
```

where `<quality>` is 0 - 100 integer. 0 - lowest quality, 100 - highest quality.

Default `quality` is 70

Also you can set `quality` by chaining `->quality(<quality>)` between `WebP::make(<UploadedFile image>)`
and `->save(<output path>);`

## License

The MIT License (MIT). Please see [License File](LICENSE.md) for more information.

[ico-version]: https://img.shields.io/packagist/v/buglinjo/laravel-webp.svg?style=flat-square

[ico-license]: https://img.shields.io/badge/license-MIT-brightgreen.svg?style=flat-square

[ico-downloads]: https://img.shields.io/packagist/dt/buglinjo/laravel-webp.svg?style=flat-square

[link-packagist]: https://packagist.org/packages/buglinjo/laravel-webp

[link-downloads]: https://packagist.org/packages/buglinjo/laravel-webp

[link-author]: https://github.com/buglinjo
