<?php

namespace Jaytaph\Spacetraders\Api\Component;

class RoutePoint
{
    public string $symbol;
    public string $type;
    public string $system;
    public int $x;
    public int $y;

    public static function fromJson(array $data): self
    {
        $result = new self();
        $result->symbol = $data['symbol'];
        $result->type = $data['type'];
        $result->system = $data['systemSymbol'];
        $result->x = $data['x'];
        $result->y = $data['y'];

        return $result;
    }
}
