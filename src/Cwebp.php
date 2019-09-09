<?php

namespace Buglinjo\LaravelWebp;

use Buglinjo\LaravelWebp\Interfaces\WebpInterface;
use Buglinjo\LaravelWebp\Traits\WebpTrait;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\File;

class Cwebp implements WebpInterface
{
    use WebpTrait;

    /**
     * @var string
     */
    protected $cwebpPath;

    /**
     * Cwebp constructor.
     */
    public function __construct()
    {
        $this->cwebpPath = Config::get('laravel-webp.drivers.cwebp.path');
    }

    /**
     * @param string $outputPath
     * @param int|null $quality
     * @return bool
     */
    public function save(string $outputPath, int $quality = null): bool
    {
        $quality = $quality ?? $this->quality;

        shell_exec($this->cwebpPath . ' -q ' . $quality . ' ' . $this->image->getPathname() . ' -o ' . $outputPath);

        return File::exists($outputPath);
    }
}