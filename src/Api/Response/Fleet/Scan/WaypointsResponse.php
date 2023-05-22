<?php

namespace Jaytaph\Spacetraders\Api\Response\Fleet\Scan;

use Jaytaph\Spacetraders\Api\Component\Cooldown;
use Jaytaph\Spacetraders\Api\Component\Waypoint;

class WaypointsResponse
{
    public Cooldown $cooldown;
    /** @var Waypoint[]  */
    public array $waypoints;

    public static function fromJson(array $data): self
    {
        $response = new self();

        $response->cooldown = Cooldown::fromJson($data['cooldown']);

        foreach ($data['waypoints'] as $waypoint) {
            $response->waypoints[] = Waypoint::fromJson($waypoint);
        }

        return $response;
    }
}
