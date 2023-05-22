<?php

namespace Jaytaph\Spacetraders\Api\Response\Fleet\Scan;

use Jaytaph\Spacetraders\Api\Component\Cooldown;
use Jaytaph\Spacetraders\Api\Component\Ship;

class ShipResponse
{
    public Cooldown $cooldown;
    /** @var Ship[]  */
    public array $ships;

    public static function fromJson(array $data): self
    {
        $response = new self();

        $response->cooldown = Cooldown::fromJson($data['cooldown']);

        foreach ($data['ships'] as $ship) {
            $response->ships[] = Ship::fromJson($ship);
        }

        return $response;
    }
}
