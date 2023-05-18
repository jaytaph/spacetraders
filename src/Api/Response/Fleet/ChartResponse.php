<?php

namespace Jaytaph\Spacetraders\Api\Response\Fleet;

use Jaytaph\Spacetraders\Api\Component\Chart;
use Jaytaph\Spacetraders\Api\Component\Waypoint;

class ChartResponse
{
    public Chart $chart;
    public Waypoint $waypoint;

    public static function fromJson(array $data): self
    {
        $result = new self();
        $result->chart = Chart::fromJson($data['chart']);
        $result->waypoint = Waypoint::fromJson($data['waypoint']);

        return $result;
    }
}
