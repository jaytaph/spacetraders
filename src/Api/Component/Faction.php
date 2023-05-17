<?php

namespace Jaytaph\Spacetraders\Api\Component;

class Faction {
    public string $symbol;
    public string $name;
    public string $description;
    public string $headquarters;
    /** @var Traits[] */
    public array $traits;

    public static function fromJson(array $data): self
    {
        $result = new self();
        $result->symbol = $data['symbol'];
        $result->name = $data['name'];
        $result->description = $data['description'];
        $result->headquarters = $data['headquarters'];
        $result->traits = array_map(function ($trait) {
            return Traits::fromJson($trait);
        }, $data['traits']);

        return $result;
    }
}
