<?php

namespace Jaytaph\Spacetraders\Api\Response\Contract;

use Jaytaph\Spacetraders\Api\Component\Contract;

class DetailResponse
{
    public Contract $contract;

    public static function fromJson(array $data): self
    {
        $result = new self();
        $result->contract = Contract::fromJson($data);

        return $result;
    }
}
