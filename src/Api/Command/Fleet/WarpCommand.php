<?php

namespace Jaytaph\Spacetraders\Api\Command\Fleet;

use Jaytaph\Spacetraders\Api\Command\Command;

class WarpCommand implements Command
{
    protected string $shipSymbol;
    protected string $waypointSymbol;

    public function __construct(string $shipSymbol, string $waypointSymbol)
    {
        $this->shipSymbol = $shipSymbol;
        $this->waypointSymbol = $waypointSymbol;
    }

    public function getMethod(): string
    {
        return 'POST';
    }

    public function getUri(): string
    {
        return '/v2/my/ships/' . $this->shipSymbol . '/warp';
    }

    public function getJson(): array
    {
        return [
            'waypointSymbol' => $this->waypointSymbol,
        ];
    }
}
