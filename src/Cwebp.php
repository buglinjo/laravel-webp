<?php

namespace Buglinjo\LaravelWebp;

use Buglinjo\LaravelWebp\Interfaces\WebpInterface;
use Buglinjo\LaravelWebp\Traits\WebpTrait;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\File;


class CwebpShellExecutionFailed extends \Exception
{
}

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
        $cmd = $this->cwebpPath . ' -q ' . $quality . ' ' . $this->image->getPathname() . ' -o ' . $outputPath;

        exec($cmd, $output, $exitCode);

        if ($exitCode !== 0) {
            throw new CwebpShellExecutionFailed(
                'Image conversion to WebP using cwebp failed with error code ' . $exitCode . ".\n"
                . "This command was used to execute cwebp: \n"
                . "  " . $cmd . "\n"
                . (
                    count($output) ?
                    "The following output was sent to stdout: \n  " . join("\n  ", $output) :
                    "No output was sent to stdout"
                ),
                $exitCode
            );
        }

        return File::exists($outputPath);
    }
}
