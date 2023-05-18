<?php

namespace Jaytaph\Spacetraders\Api\Component;

class Orbital
{
    public string $symbol;

    public static function fromJson(array $data): self
    {
        $result = new self();
        $result->symbol = $data['symbol'];

        return $result;
    }
}
