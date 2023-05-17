<?php

namespace Jaytaph\Spacetraders\Api\Response\Contract;

use Jaytaph\Spacetraders\Api\Component\Agent;
use Jaytaph\Spacetraders\Api\Component\Contract;

class FulfillResponse
{
    public Agent $agent;
    public Contract $contract;

    public static function fromJson(array $data): self
    {
        $result = new self();
        $result->agent = Agent::fromJson($data['agent']);
        $result->contract = Contract::fromJson($data['contract']);

        return $result;
    }
}
