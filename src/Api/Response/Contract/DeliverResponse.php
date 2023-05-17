<?php

namespace Jaytaph\Spacetraders\Api\Response\Contract;

use Jaytaph\Spacetraders\Api\Component\Cargo;
use Jaytaph\Spacetraders\Api\Component\Contract;

class DeliverResponse
{
    public Contract $contract;
    public Cargo $cargo;

    public static function fromJson(array $data): self
    {
        $result = new self();
        $result->contract = Contract::fromJson($data['contract']);
        $result->cargo = Cargo::fromJson($data['cargo']);

        return $result;
    }
}
