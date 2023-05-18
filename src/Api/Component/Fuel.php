<?php

namespace Jaytaph\Spacetraders\Api\Component;

class Fuel
{
    public int $current;
    public int $capacity;
    public int $consumedAmount;
    public \DateTime $consumedTimestamp;

    public static function fromJson(array $data): self
    {
        $result = new self();
        $result->current = $data['current'];
        $result->capacity = $data['capacity'];
        $result->consumedAmount = $data['consumed']['amount'];
        $result->consumedTimestamp = new \DateTime($data['consumed']['timestamp']);

        return $result;
    }
}
