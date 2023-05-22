<?php

namespace Jaytaph\Spacetraders\Api\Component;

class Stats
{
    public int $agents;
    public int $ships;
    public int $systems;
    public int $waypoints;

    public static function fromJson(array $data): self
    {
        $stats = new self();
        $stats->agents = intval($data['agents']);
        $stats->ships = intval($data['ships']);
        $stats->systems = intval($data['systems']);
        $stats->waypoints = intval($data['waypoints']);

        return $stats;
    }
}
