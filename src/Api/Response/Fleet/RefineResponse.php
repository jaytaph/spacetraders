<?php

namespace Jaytaph\Spacetraders\Api\Response\Fleet;

use Jaytaph\Spacetraders\Api\Component\Cargo;
use Jaytaph\Spacetraders\Api\Component\Consumed;
use Jaytaph\Spacetraders\Api\Component\Cooldown;
use Jaytaph\Spacetraders\Api\Component\Produced;

class RefineResponse
{
    public Cargo $cargo;
    public Cooldown $cooldown;
    /** @var Produced[] */
    public array $produced;
    /** @var Consumed[] */
    public array $consumed;

    public static function fromJson(array $data): self
    {
        $result = new self();
        $result->cargo = Cargo::fromJson($data['cargo']);
        $result->cooldown = Cooldown::fromJson($data['cooldown']);

        $result->produced = [];
        foreach ($data['produced'] as $produced) {
            $result->produced[] = Produced::fromJson($produced);
        }

        $result->consumed = [];
        foreach ($data['consumed'] as $consumed) {
            $result->consumed[] = Consumed::fromJson($consumed);
        }

        return $result;
    }
}
