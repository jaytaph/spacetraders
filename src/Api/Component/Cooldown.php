<?php

namespace Jaytaph\Spacetraders\Api\Component;

class Cooldown {
    public string $shipSymbol;
    public int $totalSeconds;
    public int $remainingSeconds;
    public \DateTime $expiration;

    public static function fromJson(array $data): self
    {
        $result = new self();
        $result->shipSymbol = $data['shipSymbol'];
        $result->totalSeconds = $data['totalSeconds'];
        $result->remainingSeconds = $data['remainingSeconds'];
        $result->expiration = new \DateTime($data['expiration']);

        return $result;
    }
}
