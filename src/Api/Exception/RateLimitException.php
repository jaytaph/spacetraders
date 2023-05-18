<?php

namespace Jaytaph\Spacetraders\Api\Exception;

class RateLimitException extends SpacetradersException
{
    public function __construct(string $message = 'Rate limit exceeded', int $code = 0, \Exception $previous = null)
    {
        parent::__construct($message, $code, $previous);
    }
}
