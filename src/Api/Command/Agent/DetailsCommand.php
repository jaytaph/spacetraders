<?php

namespace Jaytaph\Spacetraders\Api\Command\Agent;

use Jaytaph\Spacetraders\Api\Command\Command;

class DetailsCommand implements Command
{
    public function getMethod(): string
    {
        return 'GET';
    }

    public function getUri(): string
    {
        return '/v2/my/agent';
    }

    public function getJson(): array
    {
        return [];
    }
}
