<?php

namespace Jaytaph\Spacetraders\Api\Component;

class ShipType {
    public string $type;

    public static function fromJson(array $data): self
    {
        $shiptype = new self();
        $shiptype->type = $data['type'];

        return $shiptype;
    }
}
