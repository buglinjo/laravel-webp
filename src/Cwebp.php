<?php

namespace Buglinjo\LaravelWebp;

use Buglinjo\LaravelWebp\Exceptions\CwebpShellExecutionFailed;
use Buglinjo\LaravelWebp\Interfaces\WebpInterface;
use Buglinjo\LaravelWebp\Traits\WebpTrait;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Process;

class Cwebp implements WebpInterface
{
    use WebpTrait;

    /**
     * @var string
     */
    protected string $cwebpPath;

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
     * @throws CwebpShellExecutionFailed
     */
    public function save(string $outputPath, ?int $quality = null): bool
    {
        $quality = $quality ?? $this->quality;
        $cmd = [$this->cwebpPath, '-q', $quality, $this->image->getPathname(), '-o', $outputPath];

        $process = Process::command($cmd);
        $result = $process->run();

        if ($result->failed()) {
            throw new CwebpShellExecutionFailed($result->command(), $result->output(), $result->exitCode());
        }

        return File::exists($outputPath);
    }
}
