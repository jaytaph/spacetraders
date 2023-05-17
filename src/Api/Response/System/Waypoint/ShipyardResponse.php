<?php

namespace Jaytaph\Spacetraders\Api\Response\System\Waypoint;

use Jaytaph\Spacetraders\Api\Component\Shipyard;

class ShipyardResponse
{
    public Shipyard $shipyard;

    public static function fromJson(array $data): self
    {
        $result = new self();
        $result->shipyard = Shipyard::fromJson($data);

        return $result;
    }
}
