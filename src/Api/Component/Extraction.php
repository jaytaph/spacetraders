<?php

namespace Jaytaph\Spacetraders\Api\Component;

class Extraction
{
    public string $shipSymbol;
    public string $yieldSymbol;
    public int $yieldUnits;

    public static function fromJson(array $data): self
    {
        $result = new self();
        $result->shipSymbol = $data['shipSymbol'];
        $result->yieldSymbol = $data['yield']['symbol'];
        $result->yieldUnits = $data['yield']['units'];

        return $result;
    }
}
