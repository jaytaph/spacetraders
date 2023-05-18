<?php

namespace Jaytaph\Spacetraders\Api\Response\Fleet;

use Jaytaph\Spacetraders\Api\Component\Agent;
use Jaytaph\Spacetraders\Api\Component\Fuel;

class RefuelResponse
{
    public Agent $agent;
    public Fuel $fuel;

    public static function fromJson(array $data): self
    {
        $response = new self();

        $response->agent = Agent::fromJson($data['agent']);
        $response->fuel = Fuel::fromJson($data['fuel']);

        return $response;
    }
}
