<?php

namespace Jaytaph\Spacetraders\Api\Response\Fleet;

use Jaytaph\Spacetraders\Api\Component\Ship;

class DetailsResponse
{
    public Ship $ship;

    public static function fromJson(array $data): self
    {
        $result = new self();
        $result->ship = Ship::fromJson($data);

        return $result;
    }
}
