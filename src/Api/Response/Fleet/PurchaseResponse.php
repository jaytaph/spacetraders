<?php

namespace Jaytaph\Spacetraders\Api\Response\Fleet;

use Jaytaph\Spacetraders\Api\Component\Agent;
use Jaytaph\Spacetraders\Api\Component\Ship;
use Jaytaph\Spacetraders\Api\Component\ShipTransaction;

class PurchaseResponse
{
    public Agent $agent;
    public Ship $ship;
    public ShipTransaction $transaction;

    public static function fromJson(array $data): self
    {
        $result = new self();
        $result->agent = Agent::fromJson($data['agent']);
        $result->ship = Ship::fromJson($data['ship']);
        $result->transaction = ShipTransaction::fromJson($data['transaction']);

        return $result;
    }
}
