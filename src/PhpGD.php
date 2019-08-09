<?php

namespace Buglinjo\LaravelWebp;

use Buglinjo\LaravelWebp\Interfaces\WebpInterface;
use Buglinjo\LaravelWebp\Traits\WebpTrait;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\File;

class PhpGD implements WebpInterface
{
    use WebpTrait;

    /**
     * @param string $outputPath
     * @param int|null $quality
     * @return bool
     */
    public function save(string $outputPath, int $quality = null): bool
    {
        dd($this->image->getClientMimeType());
    }
}
