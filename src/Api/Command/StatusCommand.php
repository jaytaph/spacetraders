<?php

namespace Jaytaph\Spacetraders\Api\Command;

class StatusCommand implements Command
{
    public function __construct()
    {
    }

    public function getMethod(): string
    {
        return 'GET';
    }

    public function getUri(): string
    {
        return '/v2/';
    }

    public function getJson(): array
    {
        return [];
    }
}
