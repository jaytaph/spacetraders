<?php

namespace Jaytaph\Spacetraders\Api\Response\Fleet;

use Jaytaph\Spacetraders\Api\Component\Agent;
use Jaytaph\Spacetraders\Api\Component\Cargo;
use Jaytaph\Spacetraders\Api\Component\Transaction;

class SellResponse
{
    public Agent $agent;
    public Cargo $cargo;
    public Transaction $transaction;

    public static function fromJson(array $data): self
    {
        $result = new self();

        $result->agent = Agent::fromJson($data['agent']);
        $result->cargo = Cargo::fromJson($data['cargo']);
        $result->transaction = Transaction::fromJson($data['transaction']);

        return $result;
    }
}
