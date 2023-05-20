<?php

namespace Jaytaph\Spacetraders\Api\Component;

class Survey
{
    public string $signature;
    public string $symbol;
    /** @var string[] */
    public array $deposits;
    public \DateTime $expiration;
    public string $size;
    public string $rawSurvey;

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

        // THis is needed because we need to be able to return the RAW data to the API
        $response->rawSurvey = json_encode($data);

        return $response;
    }
}
