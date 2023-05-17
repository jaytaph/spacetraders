<?php

namespace Jaytaph\Spacetraders\Api\Command\Fleet;

use Jaytaph\Spacetraders\Api\Command\Command;

class JettisonCargoCommand implements Command
{
    protected string $shipSymbol;
    protected string $symbol;
    protected int $units;

    public function __construct(string $shipSymbol, string $symbol, int $units)
    {
        $this->shipSymbol = $shipSymbol;
        $this->symbol = $symbol;
        $this->units = $units;
    }

    public function getMethod(): string
    {
        return 'POST';
    }

    public function getUri(): string
    {
        return '/v2/my/ships/' . $this->symbol . '/jettison';
    }

    public function getJson(): array
    {
        return [
            'symbol' => $this->symbol,
            'units' => $this->units,
        ];
    }
}
