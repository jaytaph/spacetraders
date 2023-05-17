<?php

namespace Jaytaph\Spacetraders\Api\Command\System\Waypoint;

use Jaytaph\Spacetraders\Api\Command\Command;

class ShipyardCommand implements Command
{
    protected string $systemSymbol;
    protected string $waypointSymbol;

    public function __construct(string $systemSymbol, string $waypointSymbol)
    {
        $this->systemSymbol = $systemSymbol;
        $this->waypointSymbol = $waypointSymbol;
    }

    public function getMethod(): string
    {
        return 'GET';
    }

    public function getUri(): string
    {
        return '/v2/systems/' . $this->systemSymbol . '/waypoints/' . $this->waypointSymbol . '/shipyard';
    }

    public function getJson(): array
    {
        return [];
    }
}
