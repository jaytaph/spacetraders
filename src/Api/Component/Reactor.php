<?php

namespace Jaytaph\Spacetraders\Api\Component;

class Reactor
{
    public string $symbol;
    public string $name;
    public string $description;
    public int $condition;
    public int $powerOutput;
    public int $requirementsCrew;
    public int $requirementsSlots;
    public int $requirementsPower;

    public static function fromJson(array $data): self
    {
        $reactor = new self();
        $reactor->symbol = $data['symbol'];
        $reactor->name = $data['name'];
        $reactor->description = $data['description'];
        $reactor->condition = $data['condition'] ?? 0;
        $reactor->powerOutput = $data['powerOutput'];
        $reactor->requirementsCrew = $data['requirements']['crew'] ?? 0;
        $reactor->requirementsSlots = $data['requirements']['slots'] ?? 0;
        $reactor->requirementsPower = $data['requirements']['power'] ?? 0;

        return $reactor;
    }
}
