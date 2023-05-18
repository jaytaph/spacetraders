<?php

namespace Jaytaph\Spacetraders\Api\Component;

class ShipTransaction
{
    public string $waypointSymbol;
    public string $shipSymbol;
    public int $price;
    public string $agentSymbol;
    public \DateTime $timestamp;

    public static function fromJson(array $data): self
    {
        $result = new self();
        $result->waypointSymbol = $data['waypointSymbol'];
        $result->shipSymbol = $data['shipSymbol'];
        $result->price = $data['price'];
        $result->agentSymbol = $data['agentSymbol'];
        $result->timestamp = new \DateTime($data['timestamp']);

        return $result;
    }
}
