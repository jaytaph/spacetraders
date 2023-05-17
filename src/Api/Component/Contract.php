<?php

namespace Jaytaph\Spacetraders\Api\Component;

class Contract {
    public string $id;
    public string $factionSymbol;
    public string $type;
    public ContractTerms $terms;
    public bool $accepted;
    public bool $fulfilled;
    public \DateTime $expiration;

    public static function fromJson(array $data): self
    {
        $result = new self();
        $result->id = $data['id'];
        $result->factionSymbol = $data['factionSymbol'];
        $result->type = $data['type'];
        $result->terms = ContractTerms::fromJson($data['terms']);
        $result->accepted = $data['accepted'];
        $result->fulfilled = $data['fulfilled'];
        $result->expiration = new \DateTime($data['expiration']);

        return $result;
    }
}
