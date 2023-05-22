<?php

namespace Jaytaph\Spacetraders\Api\Response\Fleet;

use Jaytaph\Spacetraders\Api\Component\Route;

class PatchNavResponse
{
    public string $systemSymbol;
    public string $waypointSymbol;
    public Route $route;
    public string $status;
    public string $flightMode;

    public static function fromJson(array $data): self
    {
        $response = new self();

        $response->systemSymbol = $data['systemSymbol'];
        $response->waypointSymbol = $data['waypointSymbol'];
        $response->route = Route::fromJson($data['route']);
        $response->status = $data['status'];
        $response->flightMode = $data['flightMode'];

        return $response;
    }
}
