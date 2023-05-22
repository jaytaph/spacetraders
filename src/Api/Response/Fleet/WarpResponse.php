<?php

namespace Jaytaph\Spacetraders\Api\Response\Fleet;

use Jaytaph\Spacetraders\Api\Component\Fuel;
use Jaytaph\Spacetraders\Api\Component\Nav;

class WarpResponse
{
    public Fuel $fuel;
    public Nav $nav;

    public static function fromJson(array $data): self
    {
        $response = new self();

        $response->fuel = Fuel::fromJson($data['fuel']);
        $response->nav = Nav::fromJson($data['nav']);

        return $response;
    }
}
