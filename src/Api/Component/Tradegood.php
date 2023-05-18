<?php

namespace Jaytaph\Spacetraders\Api\Component;

class Tradegood
{
    public string $symbol;
    public int $tradeVolume;
    public string $supply;
    public int $purchasePrice;
    public int $sellPrice;

    public static function fromJson(array $data): self
    {
        $result = new self();
        $result->symbol = $data['symbol'];
        $result->tradeVolume = $data['tradeVolume'];
        $result->supply = $data['supply'];
        $result->purchasePrice = $data['purchasePrice'];
        $result->sellPrice = $data['sellPrice'];

        return $result;
    }
}
