<?php

namespace Jaytaph\Spacetraders\Api\Component;

class Survey {
    public string $signature;
    public string $symbol;
    /** @var string[] */
    public array $deposits;
    public \DateTime $expiration;
    public string $size;

    public static function fromJson(array $data): self
    {
        $response = new self();

        $response->signature = $data['signature'];
        $response->symbol = $data['symbol'];
        $response->deposits = array_map(function ($desposit) {
            return $desposit['symbol'];
        }, $data['deposits']);
        $response->expiration = new \DateTime($data['expiration']);
        $response->size = $data['size'];

        return $response;
    }
}
