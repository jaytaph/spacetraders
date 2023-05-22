<?php

namespace Jaytaph\Spacetraders\Api\Response\Fleet\Cargo;

use Jaytaph\Spacetraders\Api\Component\Cargo;

class DetailsResponse
{
    public cargo $cargo;

    public static function fromJson(array $data): self
    {
        $result = new self();
        $result->cargo = Cargo::fromJson($data);

        return $result;
    }
}
