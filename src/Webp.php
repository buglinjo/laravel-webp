<?php

namespace Buglinjo\LaravelWebp;

use Illuminate\Support\Facades\File;

class Webp
{
    /**
     * @var string
     */
    private $cwebpPath;

    /**
     * @var string
     */
    private $inputPath;

    /**
     * @var int
     */
    private $quality;

    /**
     * LaravelWebp constructor.
     */
    public function __construct()
    {
        $this->cwebpPath = config('laravel-webp.cwebp_path');
        $this->quality = config('laravel-webp.default_quality');
    }

    /**
     * @param $inputPath
     * @return $this
     */
    public function makeWebp($inputPath): self
    {
        $this->inputPath = $inputPath;

        return $this;
    }

    /**
     * @param $quality
     * @return $this
     */
    public function quality($quality): self
    {
        $this->quality = $quality;

        return $this;
    }

    /**
     * @param      $outputPath
     * @param null $quality
     * @return bool
     */
    public function save($outputPath, $quality = null): bool
    {
        $thisQuality = $quality ? $quality : $this->quality;

        shell_exec($this->cwebpPath . ' -q ' . $thisQuality . ' ' . $this->inputPath . ' -o ' . $outputPath);

        if (File::exists($outputPath)) {
            return true;
        } else {
            return false;
        }
    }

    /**
     * @param string $inputPath
     * @return self
     */
    public static function make($inputPath): self
    {
        return (new self())->makeWebp($inputPath);
    }
}
