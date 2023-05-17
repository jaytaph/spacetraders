<?php

namespace Jaytaph\Spacetraders\Api\Response\Fleet;

use Jaytaph\Spacetraders\Api\Component\Fuel;
use Jaytaph\Spacetraders\Api\Component\Nav;

class NavigateResponse
{
    public Fuel $fuel;
    public Nav $nav;

    public static function fromJson(array $data): self
    {
        $result = new self();
        $result->fuel = Fuel::fromJson($data['fuel']);
        $result->nav = Nav::fromJson($data['nav']);

        return $result;
    }
}
