<?php

namespace Buglinjo\LaravelWebp\Exceptions;

use Exception;
use Throwable;

class DriverIsNotSupportedException extends Exception
{
    public function __construct($driverName = "", $code = 0, Throwable $previous = null)
    {
        $message = "Driver [$driverName] is not supported.";
        
        parent::__construct($message, $code, $previous);
    }
}
