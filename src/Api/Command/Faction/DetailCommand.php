<?php

namespace Jaytaph\Spacetraders\Api\Command\Faction;

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
        return '/v2/factions/' . $this->symbol;
    }

    public function getJson(): array
    {
        return [];
    }
}
