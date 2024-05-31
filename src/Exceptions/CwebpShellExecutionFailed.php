<?php

namespace Buglinjo\LaravelWebp\Exceptions;

use Exception;
use Throwable;

class CwebpShellExecutionFailed extends Exception
{
    public function __construct(string $cmd, string $output, $code = 0, Throwable $previous = null)
    {
        parent::__construct($this->makeMessage($cmd, $code, $output), $code, $previous);
    }

    /**
     * @param string $cmd
     * @param int|null $exitCode
     * @param string $output
     * @return string
     */
    protected function makeMessage(string $cmd, ?int $exitCode, string $output): string
    {
        return 'Image conversion to WebP using cwebp failed with error code ' . $exitCode . ".\n"
            . "This command was used to execute cwebp: \n"
            . "  " . $cmd . "\n"
            . (
            trim($output)
                ? "The following output was sent to stdout: \n$output"
                : "No output was sent to stdout"
            );
    }
}
