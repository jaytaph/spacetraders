<?php

namespace Jaytaph\Spacetraders\Api\Command\Contract;

use Jaytaph\Spacetraders\Api\Command\Command;

class AcceptCommand implements Command
{
    protected string $id;

    public function __construct(string $id)
    {
        $this->id = $id;
    }

    public function getMethod(): string
    {
        return 'POST';
    }

    public function getUri(): string
    {
        return '/v2/my/contracts/' . $this->id . '/accept';
    }

    public function getJson(): array
    {
        return [];
    }
}
