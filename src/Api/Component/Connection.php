<?php

namespace Jaytaph\Spacetraders\Api\Component;

class Connection {
    public string $symbol;
    public string $sectorSymbol;
    public string $type;
    public string $factionSymbol;
    public int $x;
    public int $y;
    public int $distance;

    public static function fromJson(array $data): self
    {
        $result = new self();
        $result->symbol = strval($data['symbol']);
        $result->sectorSymbol = strval($data['sectorSymbol']);
        $result->type = strval($data['type']);
        $result->factionSymbol = strval($data['factionSymbol']);
        $result->x = intval($data['x']);
        $result->y = intval($data['y']);
        $result->distance = intval($data['distance']);

        return $result;
    }
}
