<?php

namespace Jaytaph\Spacetraders\Api\Response\Fleet;

use Jaytaph\Spacetraders\Api\Component\Cooldown;

class CooldownResponse
{
    public Cooldown $cooldown;

    public static function fromJson(array $data): self
    {
        if (count($data) == 0) {
            $data['shipSymbol'] = '';
            $data['totalSeconds'] = 0;
            $data['remainingSeconds'] = 0;
            $data['expiration'] = '01-01-1970 00:00:00Z';
        }

        $result = new self();
        $result->cooldown = Cooldown::fromJson($data);

        return $result;
    }
}
