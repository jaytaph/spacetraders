<?php

namespace Jaytaph\Spacetraders\Api\Exception;

class SpacetradersException extends \RuntimeException
{
    public function __construct(string $message, int $code = 0, \Throwable $previous = null)
    {
        $message = "Spacetraders API error: $message";
        parent::__construct($message, $code, $previous);
    }
}
