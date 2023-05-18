<?php

namespace Jaytaph\Spacetraders\Api\Component;

class Traits
{
    public string $symbol;
    public string $name;
    public string $description;

    public static function fromJson(array $data): self
    {
        $result = new self();
        $result->symbol = $data['symbol'];
        $result->name = $data['name'];
        $result->description = $data['description'];

        return $result;
    }
}
