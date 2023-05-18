<?php

namespace Jaytaph\Spacetraders\Api\Component;

class System
{
    public string $symbol;
    public string $sectorSymbol;
    public string $type;
    public int $x;
    public int $y;
    /** @var Waypoint[] */
    public array $waypoints;
    /** @var string[] */
    public array $factions;

    public static function fromJson(array $data): self
    {
        $result = new self();
        $result->symbol = $data['symbol'];
        $result->sectorSymbol = $data['sectorSymbol'];
        $result->type = $data['type'];
        $result->x = $data['x'];
        $result->y = $data['y'];
        $result->waypoints = array_map(function ($waypoint) {
            return Waypoint::fromJson($waypoint);
        }, $data['waypoints']);
        $result->factions = array_map(function ($faction) {
            return $faction['symbol'];
        }, $data['factions']);

        return $result;
    }
}
