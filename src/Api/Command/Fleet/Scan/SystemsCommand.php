<?php

namespace Jaytaph\Spacetraders\Api\Command\Fleet\Scan;

use Jaytaph\Spacetraders\Api\Command\Command;

class SystemsCommand implements Command
{
    protected string $shipSymbol;

    public function __construct(string $shipSymbol)
    {
        $this->shipSymbol = $shipSymbol;
    }

    public function getMethod(): string
    {
        return 'POST';
    }

    public function getUri(): string
    {
        return '/v2/my/ships/' . $this->shipSymbol . '/scan/systems';
    }

    public function getJson(): array
    {
        return [];
    }
}
