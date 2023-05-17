<?php

namespace Jaytaph\Spacetraders\Api\Response\Fleet;

use Jaytaph\Spacetraders\Api\Component\Cooldown;

class CooldownResponse
{
    public Cooldown $cooldown;

    public static function fromJson(array $data): self
    {
        if (count($data) == 0) {
            return new self();
        }

        $result = new self();
        $result->cooldown = Cooldown::fromJson($data);

        return $result;
    }
}
