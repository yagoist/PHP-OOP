<?php

namespace App\Exceptions;

class RedirectException extends HttpException
{
    public function __construct(
        public readonly string $url,
        $message = "",
        int $code = 0,
        ?Throwable $previous = null
    ) {
        parent::__construct($message, $code, $previous);
    }
}