<?php

namespace Jaytaph\Spacetraders\Api\Response\Fleet;

use Jaytaph\Spacetraders\Api\Component\Cargo;

class JettisonCargoResponse
{
    public Cargo $cargo;

    public static function fromJson(array $data): self
    {
        $result = new self();

        $result->cargo = Cargo::fromJson($data['cargo']);

        return $result;
    }
}
