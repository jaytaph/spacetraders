<?php

namespace Jaytaph\Spacetraders\Api\Response\Fleet;

use Jaytaph\Spacetraders\Api\Component\Agent;
use Jaytaph\Spacetraders\Api\Component\Cargo;
use Jaytaph\Spacetraders\Api\Component\Cooldown;
use Jaytaph\Spacetraders\Api\Component\Extraction;
use Jaytaph\Spacetraders\Api\Component\Ship;
use Jaytaph\Spacetraders\Api\Component\ShipTransaction;

class ExtractResponse
{
    public Cooldown $cooldown;
    public Extraction $extraction;
    public Cargo $cargo;

    public static function fromJson(array $data): self
    {
        $result = new self();
        $result->cooldown = Cooldown::fromJson($data['cooldown']);
        $result->extraction = Extraction::fromJson($data['extraction']);
        $result->cargo = Cargo::fromJson($data['cargo']);

        return $result;
    }
}
