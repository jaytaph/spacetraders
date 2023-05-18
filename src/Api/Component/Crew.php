<?php

namespace Jaytaph\Spacetraders\Api\Component;

class Crew
{
    public int $current;
    public int $capacity;
    public int $required;
    public string $rotation;
    public int $morale;
    public int $wages;

    public static function fromJson(array $data): self
    {
        $result = new self();
        $result->current = $data['current'];
        $result->capacity = $data['capacity'];
        $result->required = $data['required'];
        $result->rotation = $data['rotation'];
        $result->morale = $data['morale'];
        $result->wages = $data['wages'];

        return $result;
    }
}
