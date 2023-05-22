<?php

namespace Jaytaph\Spacetraders\Api\Command\Contract;

use Jaytaph\Spacetraders\Api\Command\Command;

class DetailsCommand implements Command
{
    protected string $id;

    public function __construct(string $id)
    {
        $this->id = $id;
    }

    public function getMethod(): string
    {
        return 'GET';
    }

    public function getUri(): string
    {
        return '/v2/my/contracts/' . $this->id;
    }

    public function getJson(): array
    {
        return [];
    }
}
