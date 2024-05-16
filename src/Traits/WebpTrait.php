<?php

namespace Buglinjo\LaravelWebp\Traits;

use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Config;

trait WebpTrait
{
    /**
     * @var UploadedFile
     */
    protected $image;

    /**
     * @var int
     */
    protected $quality;

    /**
     * @param UploadedFile $image
     * @return $this
     */
    public function make(UploadedFile $image): self
    {
        $this->quality = Config::get('laravel-webp.default_quality');
        $this->image = $image;

        return $this;
    }

    /**
     * @param int|null $quality
     * @return $this
     */
    public function quality(?int $quality): self
    {
        $this->quality = $quality;

        return $this;
    }
}
