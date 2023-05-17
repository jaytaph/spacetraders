<?php

namespace Jaytaph\Spacetraders\Api\Response\System\Waypoint;

use Jaytaph\Spacetraders\Api\Component\Market;

class MarketResponse
{
    public Market $market;

    public static function fromJson(array $data): self
    {
        $result = new self();
        $result->market = Market::fromJson($data);

        return $result;
    }
}
