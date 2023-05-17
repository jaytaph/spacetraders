<?php

namespace Jaytaph\Spacetraders\Api\Response\System\Waypoint;

use Jaytaph\Spacetraders\Api\Component\Jumpgate;

class JumpgateResponse
{
    public Jumpgate $jumpgate;

    public static function fromJson(array $data): self
    {
        $result = new self();
        $result->jumpgate = Jumpgate::fromJson($data);

        return $result;
    }
}
