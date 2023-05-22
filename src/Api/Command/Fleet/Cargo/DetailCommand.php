<?php

namespace Jaytaph\Spacetraders\Api\Command\Fleet\Cargo;

use Jaytaph\Spacetraders\Api\Command\Command;

class DetailCommand implements Command
{
    protected string $symbol;

    public function __construct(string $symbol)
    {
        $this->symbol = $symbol;
    }

    public function getMethod(): string
    {
        return 'GET';
    }

    public function getUri(): string
    {
        return '/v2/my/ships/' . $this->symbol . '/cargo';
    }

    public function getJson(): array
    {
        return [];
    }
}
