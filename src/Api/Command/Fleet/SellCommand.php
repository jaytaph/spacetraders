<?php

namespace Jaytaph\Spacetraders\Api\Command\Fleet;

use Jaytaph\Spacetraders\Api\Command\Command;

class SellCommand implements Command
{
    protected string $ship;
    protected string $symbol;
    protected int $units;

    public function __construct(string $ship, string $symbol, int $units)
    {
        $this->ship = $ship;
        $this->symbol = $symbol;
        $this->units = $units;
    }

    public function getMethod(): string
    {
        return 'POST';
    }

    public function getUri(): string
    {
        return '/v2/my/ships/' . $this->ship . '/sell';
    }

    public function getJson(): array
    {
        return [
            'symbol' => $this->symbol,
            'units' => $this->units,
        ];
    }
}
