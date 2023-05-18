<?php

namespace Jaytaph\Spacetraders\Api\Component;

class Mount
{
    public string $symbol;
    public string $name;
    public string $description;
    public int $strength;
    public int $requirementsCrew;
    public int $requirementsPower;
    public int $requirementsSlots;
    /** @var string[] */
    public array $deposits;

    public static function fromJson(array $data): self
    {
        $mount = new self();
        $mount->symbol = $data['symbol'];
        $mount->name = $data['name'];
        $mount->description = $data['description'];
        $mount->strength = $data['strength'];
        $mount->requirementsCrew = $data['requirements']['crew'] ?? 0;
        $mount->requirementsPower = $data['requirements']['power'] ?? 0;
        $mount->requirementsSlots = $data['requirements']['slots'] ?? 0;
        $mount->deposits = $data['deposits'] ?? [];

        return $mount;
    }
}
