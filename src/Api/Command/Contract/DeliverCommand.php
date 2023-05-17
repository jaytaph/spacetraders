<?php

namespace Jaytaph\Spacetraders\Api\Command\Contract;

use Jaytaph\Spacetraders\Api\Command\Command;

class DeliverCommand implements Command
{
    protected string $id;
    protected string $shipSymbol;
    protected string $tradeSymbol;
    protected int $units;

    /**
     * @param string $id
     * @param string $shipSymbol
     * @param string $tradeSymbol
     * @param int $units
     */
    public function __construct(string $id, string $shipSymbol, string $tradeSymbol, int $units)
    {
        $this->id = $id;
        $this->shipSymbol = $shipSymbol;
        $this->tradeSymbol = $tradeSymbol;
        $this->units = $units;
    }

    public function getMethod(): string
    {
        return 'POST';
    }

    public function getUri(): string
    {
        return '/v2/my/contracts/' . $this->id . '/deliver';
    }

    public function getJson(): array
    {
        return [
            'shipSymbol' => $this->shipSymbol,
            'tradeSymbol' => $this->tradeSymbol,
            'units' => $this->units,
        ];
    }
}
