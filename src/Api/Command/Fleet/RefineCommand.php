<?php

namespace Jaytaph\Spacetraders\Api\Command\Fleet;

use Jaytaph\Spacetraders\Api\Command\Command;

class RefineCommand implements Command
{
    protected string $symbol;
    protected string $produce;

    public function __construct(string $symbol, string $produce)
    {
        $this->symbol = $symbol;
        $this->produce = $produce;
    }

    public function getMethod(): string
    {
        return 'POST';
    }

    public function getUri(): string
    {
        return '/v2/my/ships/' . $this->symbol . '/refine';
    }

    public function getJson(): array
    {
        return [
            'produce' => $this->produce,
        ];
    }
}
