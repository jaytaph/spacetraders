<?php

namespace Jaytaph\Spacetraders\Api\Component;

class ServerResets
{
    public string $next;
    public string $frequency;

    public static function fromJson(array $data): self
    {
        $serverResets = new self();
        $serverResets->next = $data['next'];
        $serverResets->frequency = $data['frequency'];

        return $serverResets;
    }
}
