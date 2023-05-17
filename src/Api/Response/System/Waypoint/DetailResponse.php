<?php

namespace Jaytaph\Spacetraders\Api\Response\System\Waypoint;

use Jaytaph\Spacetraders\Api\Component\Waypoint;

class DetailResponse
{
    public Waypoint $waypoint;

    public static function fromJson(array $data): self
    {
        $result = new self();
        $result->waypoint = Waypoint::fromJson($data);

        return $result;
    }
}
