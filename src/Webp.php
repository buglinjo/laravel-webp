<?php

namespace Buglinjo\LaravelWebp;

use Buglinjo\LaravelWebp\Exceptions\DriverIsNotSupportedException;
use Illuminate\Support\Facades\Config;
use Illuminate\Http\UploadedFile;

class Webp
{
    /**
     * @param UploadedFile $image
     * @return Cwebp|PhpGD|Traits\WebpTrait|null
     * @throws DriverIsNotSupportedException
     */
    public static function make(UploadedFile $image)
    {
        $driver = Config::get('laravel-webp.default_driver');
        $availableDrivers = Config::get('laravel-webp.drivers');

        if (!in_array($driver, array_keys($availableDrivers))) {
            throw new DriverIsNotSupportedException($driver);
        }

        switch ($driver) {
            case 'php-gd':
                return (new PhpGD())->make($image);
            case 'cwebp':
                return (new Cwebp())->make($image);
        }

        return null;
    }
}
