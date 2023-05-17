<?php

namespace Jaytaph\Spacetraders\Api\Component;

class Produced {
    public string $tradeSymbol;
    public int $units;

    public static function fromJson(array $data): self
    {
        $result = new self();
        $result->tradeSymbol = $data['tradeSymbol'];
        $result->units = intval($data['units']);

        return $result;
    }
}
