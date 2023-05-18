<?php

namespace Jaytaph\Spacetraders\Api\Component;

class ContractDelivery
{
    public string $destination;
    public string $tradeSymbol;
    public int $unitsFulfilled;
    public int $unitsRequired;

    public static function fromJson(array $data): self
    {
        $result = new self();
        $result->destination = $data['destinationSymbol'];
        $result->tradeSymbol = $data['tradeSymbol'];
        $result->unitsFulfilled = $data['unitsFulfilled'];
        $result->unitsRequired = $data['unitsRequired'];

        return $result;
    }
}
