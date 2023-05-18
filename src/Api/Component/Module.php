<?php

namespace Jaytaph\Spacetraders\Api\Component;

class Module
{
    public string $symbol;
    public string $name;
    public string $description;
    public int $capacity;
    public int $range;
    public int $requirementsCrew;
    public int $requirementsPower;
    public int $requirementsSlots;

    public static function fromJson(array $data): self
    {
        $module = new self();
        $module->symbol = $data['symbol'];
        $module->name = $data['name'];
        $module->description = $data['description'];
        $module->capacity = $data['capacity'] ?? 0;
        $module->range = $data['range'] ?? 0;
        $module->requirementsCrew = $data['requirements']['crew'];
        $module->requirementsPower = $data['requirements']['power'];
        $module->requirementsSlots = $data['requirements']['slots'];

        return $module;
    }
}
