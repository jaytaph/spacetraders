<?php

namespace Jaytaph\Spacetraders\Api\Response\System;

use Jaytaph\Spacetraders\Api\Component\System;

class DetailsResponse
{
    public System $system;

    public static function fromJson(array $data): self
    {
        $result = new self();
        $result->system = System::fromJson($data);

        return $result;
    }
}
