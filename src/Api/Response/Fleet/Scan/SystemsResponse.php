<?php

namespace Jaytaph\Spacetraders\Api\Response\Fleet\Scan;

use Jaytaph\Spacetraders\Api\Component\Cooldown;
use Jaytaph\Spacetraders\Api\Component\System;

class SystemsResponse
{
    public Cooldown $cooldown;
    /** @var System[]  */
    public array $systems;

    public static function fromJson(array $data): self
    {
        $response = new self();

        $response->cooldown = Cooldown::fromJson($data['cooldown']);

        foreach ($data['systems'] as $system) {
            $response->systems[] = System::fromJson($system);
        }

        return $response;
    }
}
