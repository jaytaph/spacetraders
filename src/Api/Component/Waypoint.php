<?php

namespace Jaytaph\Spacetraders\Api\Component;

class Waypoint {
    public string $symbol;
    public string $type;
    public string $systemSymbol;
    public int $x;
    public int $y;
    /** @var Orbital[] */
    public array $orbitals;
    /** @var Traits[] */
    public array $traits;
    public string $faction;
    public ?Chart $chart = null;

    public static function fromJson(array $data): self
    {
        $result = new self();
        $result->symbol = $data['symbol'];
        $result->type = $data['type'];
        $result->x = $data['x'];
        $result->y = $data['y'];

        $result->orbitals = array_map(function ($orbital) {
            return Orbital::fromJson($orbital);
        }, $data['orbitals'] ?? []);
        $result->traits = array_map(function ($trait) {
            return Traits::fromJson($trait);
        }, $data['traits'] ?? []);
        $result->systemSymbol = $data['systemSymbol'] ?? '';
        $result->chart = isset($data['chart']) ? Chart::fromJson($data['chart']) : null;
        $result->faction = isset($data['faction']) ? $data['faction']['symbol'] : '';

        return $result;
    }
}
