<?php

namespace Jaytaph\Spacetraders\Api\Command\System;

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

    // return url with query arguments $page and $limit
    public function getUri(): string
    {
        $queryString = http_build_query([
            'page' => $this->page,
            'limit' => $this->limit
        ]);

        return '/v2/systems?' . $queryString;
    }

    public function getJson(): array
    {
        return [];
    }
}
