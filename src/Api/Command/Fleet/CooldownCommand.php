<?php

namespace Jaytaph\Spacetraders\Api\Command\Fleet;

use Jaytaph\Spacetraders\Api\Command\Command;

class CooldownCommand implements Command
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
        return '/v2/my/ships/' . $this->symbol . '/cooldown';
    }

    public function getJson(): array
    {
        return [];
    }
}
