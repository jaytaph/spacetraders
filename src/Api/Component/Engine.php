<?php

namespace Jaytaph\Spacetraders\Api\Component;

class Engine {
    public string $symbol;
    public string $name;
    public string $description;
    public int $condition;
    public int $speed;
    public int $requirementsPower;
    public int $requirementsCrew;

    public static function fromJson(array $data): self
{
        $engine = new self();
        $engine->symbol = $data['symbol'];
        $engine->name = $data['name'];
        $engine->description = $data['description'];
        $engine->condition = $data['condition'];
        $engine->speed = $data['speed'];
        $engine->requirementsPower = $data['requirements']['power'];
        $engine->requirementsCrew = $data['requirements']['crew'];

        return $engine;
    }


}
