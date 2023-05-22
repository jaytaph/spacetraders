<?php

namespace Jaytaph\Spacetraders\Api\Response\Faction;

use Jaytaph\Spacetraders\Api\Component\Faction;

class DetailsResponse
{
    public Faction $faction;

    public static function fromJson(array $data): self
    {
        $result = new self();
        $result->faction = Faction::fromJson($data);

        return $result;
    }
}
