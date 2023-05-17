<?php

namespace Jaytaph\Spacetraders\Api\Command\Fleet;

use Jaytaph\Spacetraders\Api\Command\Command;

class PatchNavCommand implements Command
{
    protected string $shipSymbol;
    protected string $flightmode;

    public function __construct(string $shipSymbol, string $flightmode)
    {
        $this->shipSymbol = $shipSymbol;
        $this->flightmode = $flightmode;
    }

    public function getMethod(): string
    {
        return 'PATCH';
    }

    public function getUri(): string
    {
        return '/v2/my/ships/' . $this->shipSymbol . '/nav';
    }

    public function getJson(): array
    {
        return [
            'flightmode' => $this->flightmode,
        ];
    }
}
