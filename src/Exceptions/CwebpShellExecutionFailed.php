<?php

namespace Buglinjo\LaravelWebp\Exceptions;

use Exception;
use Throwable;

class CwebpShellExecutionFailed extends Exception
{
    public function __construct(string $cmd, $output, $code = 0, Throwable $previous = null)
    {
        parent::__construct($this->makeMessage($cmd, $code, $output), $code, $previous);
    }

    /**
     * @param string $cmd
     * @param int $exitCode
     * @param $output
     * @return string
     */
    protected function makeMessage(string $cmd, int $exitCode, $output): string
    {
        return 'Image conversion to WebP using cwebp failed with error code ' . $exitCode . ".\n"
            . "This command was used to execute cwebp: \n"
            . "  " . $cmd . "\n"
            . (
            count($output)
                ? "The following output was sent to stdout: \n  " . join("\n  ", $output)
                : "No output was sent to stdout"
            );
    }
}
