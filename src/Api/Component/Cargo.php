<?php

namespace Jaytaph\Spacetraders\Api\Component;

class Cargo {
    public int $capacity;
    public int $units;
    /** @var Inventory[]  */
    public array $inventory;

    public static function fromJson(array $data): self
    {
        $result = new self();
        $result->capacity = $data['capacity'];
        $result->units = $data['units'];
        $result->inventory = array_map(function ($item) {
            return Inventory::fromJson($item);
        }, $data['inventory']);

        return $result;
    }
}
