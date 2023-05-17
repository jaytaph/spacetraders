<?php

namespace Jaytaph\Spacetraders\Api\Response\Agent;

class Response
{
    public string $accountId;
    public string $symbol;
    public string $headquarters;
    public int $credits;

    public static function fromJson(array $data): self
    {
        $result = new self();
        $result->accountId = $data['accountId'];
        $result->symbol = $data['symbol'];
        $result->headquarters = $data['headquarters'];
        $result->credits = $data['credits'];

        return $result;
    }
}
