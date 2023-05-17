<?php

namespace Jaytaph\Spacetraders\Api\Exception;

class RateLimitException extends SpacetradersException
{
    public function __construct($message = 'Rate limit exceeded', $code = 0, \Exception $previous = null)
    {
        parent::__construct($message, $code, $previous);
    }
}
