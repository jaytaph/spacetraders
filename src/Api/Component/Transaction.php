<?php

namespace Jaytaph\Spacetraders\Api\Component;

class Transaction {
    public string $waypointSymbol;
    public string $shipSymbol;
    public string $tradeSymbol;
    public string $type;
    public int $units;
    public int $pricePerUnit;
    public int $totalPrice;
    public \DateTime $timestamp;

    public static function fromJson(array $data): self
    {
        $result = new self();
        $result->waypointSymbol = $data['waypointSymbol'];
        $result->shipSymbol = $data['shipSymbol'];
        $result->tradeSymbol = $data['tradeSymbol'];
        $result->type = $data['type'];
        $result->units = $data['units'];
        $result->pricePerUnit = $data['pricePerUnit'];
        $result->totalPrice = $data['totalPrice'];
        $result->timestamp = new \DateTime($data['timestamp']);

        return $result;
    }
}
