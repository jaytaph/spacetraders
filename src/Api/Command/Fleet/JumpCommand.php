<?php

namespace Jaytaph\Spacetraders\Api\Command\Fleet;

use Jaytaph\Spacetraders\Api\Command\Command;

class JumpCommand implements Command
{
    protected string $shipSymbol;
    protected string $systemSymbol;

    public function __construct(string $shipSymbol, string $systemSymbol)
    {
        $this->shipSymbol = $shipSymbol;
        $this->systemSymbol = $systemSymbol;
    }

    public function getMethod(): string
    {
        return 'POST';
    }

    public function getUri(): string
    {
        return '/v2/my/ships/' . $this->shipSymbol . '/jump';
    }

    public function getJson(): array
    {
        return [
            'systemSymbol' => $this->systemSymbol,
        ];
    }
}
