<?php

namespace Jaytaph\Spacetraders\Api\Command\Faction;

use Jaytaph\Spacetraders\Api\Command\Command;

class ListCommand implements Command
{
    protected int $page;
    protected int $limit;

    public function __construct(int $page, int $limit)
    {
        $this->page = $page;
        $this->limit = $limit;
    }

    public function getMethod(): string
    {
        return 'GET';
    }

    public function getUri(): string
    {
        return '/v2/factions';
    }

    public function getJson(): array
    {
        return [];
    }
}
