<?php

namespace Jaytaph\Spacetraders\Api\Command\Fleet\Cargo;

use Jaytaph\Spacetraders\Api\Command\Command;

class TransferCommand implements Command
{
    protected string $ship;
    protected string $symbol;
    protected int $units;
    protected string $targetShip;

    public function __construct(string $ship, string $symbol, int $units, string $targetShip)
    {
        $this->ship = $ship;
        $this->symbol = $symbol;
        $this->units = $units;
        $this->targetShip = $targetShip;
    }

    public function getMethod(): string
    {
        return 'POST';
    }

    public function getUri(): string
    {
        return '/v2/my/ships/' . $this->ship . '/transfer';
    }

    public function getJson(): array
    {
        return [
            'tradeSymbol' => $this->symbol,
            'units' => $this->units,
            'shipSymbol' => $this->targetShip,
        ];
    }
}
