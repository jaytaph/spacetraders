<?php

namespace Jaytaph\Spacetraders\Api\Component;

class Frame
{
    public string $symbol;
    public string $name;
    public string $description;
    public int $moduleSlots;
    public int $mountingPoints;
    public int $fuelCapacity;
    public int $condition;
    public int $requirementsPower;
    public int $requirementsCrew;

    public static function fromJson(array $data): self
    {
        $frame = new self();
        $frame->symbol = $data['symbol'];
        $frame->name = $data['name'];
        $frame->description = $data['description'];
        $frame->moduleSlots = $data['moduleSlots'];
        $frame->mountingPoints = $data['mountingPoints'];
        $frame->fuelCapacity = $data['fuelCapacity'];
        $frame->condition = $data['condition'];
        $frame->requirementsPower = $data['requirements']['power'];
        $frame->requirementsCrew = $data['requirements']['crew'];

        return $frame;
    }
}
