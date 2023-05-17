<?php

namespace Jaytaph\Spacetraders\Api\Response;

use Jaytaph\Spacetraders\Api\Component\Agent;
use Jaytaph\Spacetraders\Api\Component\Contract;
use Jaytaph\Spacetraders\Api\Component\Faction;
use Jaytaph\Spacetraders\Api\Component\Ship;

class RegisterResponse
{
    public string $token;
    public Agent $agent;
    public Contract $contract;
    public Faction $faction;
    public Ship $ship;

    public static function fromJson(array $data): self
    {
        $result = new self();
        $result->token = $data['token'];
        $result->agent = Agent::fromJson($data['agent']);
        $result->contract = Contract::fromJson($data['contract']);
        $result->faction = Faction::fromJson($data['faction']);
        $result->ship = Ship::fromJson($data['ship']);

        return $result;
    }
}
