<?php

namespace Jaytaph\Spacetraders\Api\Component;

class Nav
{
    public string $system;
    public string $waypoint;
    public Route $route;
    public string $status;
    public string $flightmode;

    public static function fromJson(array $data): self
    {
        $result = new self();
        $result->system = $data['systemSymbol'];
        $result->waypoint = $data['waypointSymbol'];
        $result->route = Route::fromJson($data['route']);
        $result->status = $data['status'];
        $result->flightmode = $data['flightMode'];

        return $result;
    }
}
