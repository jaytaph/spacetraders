<?php

namespace Jaytaph\Spacetraders\Api\Response\Fleet;

use Jaytaph\Spacetraders\Api\Component\Nav;

class DockResponse
{
    public Nav $nav;

    public static function fromJson(array $data): self
    {
        $result = new self();
        $result->nav = Nav::fromJson($data['nav']);

        return $result;
    }
}
