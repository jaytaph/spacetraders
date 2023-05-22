<?php

namespace Jaytaph\Spacetraders\Api\Response\Fleet;

use Jaytaph\Spacetraders\Api\Component\Cooldown;
use Jaytaph\Spacetraders\Api\Component\Nav;

class JumpResponse
{
    public Cooldown $cooldown;
    public Nav $nav;

    public static function fromJson(array $data, array $meta): self
    {
        $response = new self();

        $response->cooldown = Cooldown::fromJson($data['cooldown']);
        $response->nav = Nav::fromJson($data['nav']);

        return $response;
    }
}
