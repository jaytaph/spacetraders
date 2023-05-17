<?php

namespace Jaytaph\Spacetraders\Api\Response\System\Waypoint;

use Jaytaph\Spacetraders\Api\Component\Waypoint;

class ListResponse
{
    public int $total;
    public int $page;
    public int $limit;
    /** @var Waypoint[] */
    public array $waypoints;

    public static function fromJson(array $data, array $meta): self
    {
        $result = new self();
        $result->total = $meta['total'];
        $result->page = $meta['page'];
        $result->limit = $meta['limit'];
        $result->waypoints = array_map(function ($system) {
            return Waypoint::fromJson($system);
        }, $data);

        return $result;
    }
}
