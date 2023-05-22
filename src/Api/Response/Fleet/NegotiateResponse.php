<?php

namespace Jaytaph\Spacetraders\Api\Response\Fleet;

use Jaytaph\Spacetraders\Api\Component\Contract;

class NegotiateResponse
{
    public Contract $contract;

    public static function fromJson(array $data): self
    {
        $response = new self();

        $response->contract = Contract::fromJson($data['contract']);

        return $response;
    }
}
