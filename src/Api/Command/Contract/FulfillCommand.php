<?php

namespace Jaytaph\Spacetraders\Api\Command\Contract;

use Jaytaph\Spacetraders\Api\Command\Command;

class FulfillCommand implements Command
{
    protected string $id;

    public function getMethod(): string
    {
        return 'POST';
    }

    public function getUri(): string
    {
        return '/v2/my/contracts/' . $this->id . '/fulfill';
    }

    public function getJson(): array
    {
        return [];
    }
}
