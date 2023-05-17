<?php

namespace Jaytaph\Spacetraders\Api\Command;

interface Command
{
    public function getMethod(): string;

    public function getUri(): string;

    public function getJson(): array;
}
