<?php

namespace Jaytaph\Spacetraders\Api\Command\Fleet\Cargo;

use Jaytaph\Spacetraders\Api\Command\Command;

class PurchaseCommand implements Command
{
    public string $shipSymbol;
    public string $symbol;
    public int $units;

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
        return '/v2/my/ships/' . $this->shipSymbol . '/purchase';
    }

    public function getJson(): array
    {
        return [
            'symbol' => $this->symbol,
            'units' => $this->units,
        ];
    }
}
