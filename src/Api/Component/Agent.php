<?php

namespace Jaytaph\Spacetraders\Api\Component;

class Agent
{
    public string $accountId;
    public string $callsign;
    public string $headquarters;
    public int $credits;

    public static function fromJson(array $data): self
    {
        $result = new self();
        $result->accountId = $data['accountId'];
        $result->callsign = $data['symbol'];
        $result->headquarters = $data['headquarters'];
        $result->credits = $data['credits'];

        return $result;
    }
}
