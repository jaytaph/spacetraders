<?php

namespace Jaytaph\Spacetraders\Api\Component;

class Shipyard {
    public string $symbol;
    /** @var ShipType[] */
    public array $shipTypes;
    /** @var ShipTransaction[] */
    public array $transactions;
    /** @var ShipPurchase[] */
    public array $shipPurchases;

    public static function fromJson(array $data): self
    {
        $result = new self();
        $result->symbol = $data['symbol'];
        $result->shipTypes = array_map(function ($shipType) {
            return ShipType::fromJson($shipType);
        }, $data['shipTypes'] ?? []);
        $result->transactions = array_map(function ($transaction) {
            return ShipTransaction::fromJson($transaction);
        }, $data['transactions'] ?? []);
        $result->shipPurchases = array_map(function ($ship) {
            return ShipPurchase::fromJson($ship);
        }, $data['ships'] ?? []);

        return $result;
    }
}
