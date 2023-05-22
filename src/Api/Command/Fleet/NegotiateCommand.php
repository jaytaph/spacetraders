<?php

namespace Jaytaph\Spacetraders\Api\Command\Fleet;

use Jaytaph\Spacetraders\Api\Command\Command;

class NegotiateCommand implements Command
{
    protected string $shipSymbol;

    public function __construct(string $shipSymbol)
    {
        $this->waypointSymbol = $waypointSymbol;
    }

    public function getMethod(): string
    {
        return 'POST';
    }

    public function getUri(): string
    {
        return '/v2/my/ships/' . $this->shipSymbol . '/negotiate/contract';
    }

    public function getJson(): array
    {
        return [];
    }
}
