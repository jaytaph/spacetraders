<?php

namespace Jaytaph\Spacetraders\Api\Command\Fleet;

use Jaytaph\Spacetraders\Api\Command\Command;

class PurchaseCommand implements Command
{
    protected string $shipType;
    protected string $waypointSymbol;

    public function __construct(string $shipType, string $waypointSymbol)
    {
        $this->shipType = $shipType;
        $this->waypointSymbol = $waypointSymbol;
    }

    public function getMethod(): string
    {
        return 'POST';
    }

    public function getUri(): string
    {
        return '/v2/my/ships/';
    }

    public function getJson(): array
    {
        return [
            'shipType' => $this->shipType,
            'waypointSymbol' => $this->waypointSymbol,
        ];
    }
}
