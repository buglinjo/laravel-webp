## WebP (.webp) comes to Laravel 5

[![Latest Version on Packagist][ico-version]][link-packagist]
[![Software License][ico-license]](LICENSE.md)
[![Total Downloads][ico-downloads]][link-downloads]

## About

WebP is a modern image format that provides superior lossless and lossy compression for images on the web. Using WebP, webmasters and web developers can create smaller, richer images that make the web faster.

WebP lossless images are 26% smaller in size compared to PNGs. WebP lossy images are 25-34% smaller than comparable JPEG images at equivalent SSIM quality index.

Lossless WebP supports transparency (also known as alpha channel) at a cost of just 22% additional bytes. For cases when lossy RGB compression is acceptable, lossy WebP also supports transparency, typically providing 3× smaller file sizes compared to PNG.


`cwebp` compresses an image using the WebP format. Input format can be either `PNG`, `JPEG`, `TIFF`, `WebP` or raw `Y'CbCr` samples.

## Before Installation

Note: You will need to install WebP before installing this package. For more information you can visit this [page](https://developers.google.com/speed/webp/)

## Install

Via Composer

``` bash
$ composer require buglinjo/laravel-webp
```

After updating composer, add the ServiceProvider to the providers array in config/app.php
```php
Buglinjo\LaravelWebp\LaravelWebpServiceProvider::class,
```

You can use the facade for shorter code. Add this to your aliases:
```php
'WebP' => Buglinjo\LaravelWebp\Facades\LaravelWebp::class,
```

You will need to publish config file to add `cwebp` global path.

```
php artisan vendor:publish --provider="Buglinjo\LaravelWebp\LaravelWebpServiceProvider" --tag=config
```

In `config/laravel-webp.php` config file you should set `cwebp` global path.

``` php
    return [
    	/*
    	|--------------------------------------------------------------------------
    	| Configuration
    	|--------------------------------------------------------------------------
    	*/
    
    	'cwebp_path'      => 'C:\libwebp\bin\cwebp.exe',
    	'default_quality' => 70,
    ];
```

## Usage

``` php
WebP::make(<input path>)->save(<output path>, <quality :optional>);
```
where `<quality>` is 0 - 100 integer. 0 - lowest quality, 100 - highest quality.

Also you can set `quality` by chaining `->quality(<quality>)` between `WebP::make(<input path>)` and `->save(<output path>);`

## License

The MIT License (MIT). Please see [License File](LICENSE.md) for more information.

[ico-version]: https://img.shields.io/packagist/v/buglinjo/laravel-webp.svg?style=flat-square
[ico-license]: https://img.shields.io/badge/license-MIT-brightgreen.svg?style=flat-square
[ico-downloads]: https://img.shields.io/packagist/dt/buglinjo/laravel-webp.svg?style=flat-square

[link-packagist]: https://packagist.org/packages/buglinjo/laravel-webp
[link-downloads]: https://packagist.org/packages/buglinjo/laravel-webp
[link-author]: https://github.com/buglinjo
