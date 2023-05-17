<?php

namespace Jaytaph\Spacetraders\Api\Component;

class Inventory {
    public string $symbol;
    public string $name;
    public string $description;
    public int $units;

    public static function fromJson(array $data): self
    {
        $result = new self();
        $result->symbol = $data['symbol'];
        $result->name = $data['name'];
        $result->description = $data['description'];
        $result->units = $data['units'];

        return $result;
    }
}
