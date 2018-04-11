<?php

namespace App\Exception;

use Symfony\Component\Security\Core\Exception\AuthenticationException;
use Throwable;

class ApiException extends AuthenticationException
{
    public function __construct($message = "", $code = 0, Throwable $previous = null)
    {
        parent::__construct($message, $code, $previous);
    }
}