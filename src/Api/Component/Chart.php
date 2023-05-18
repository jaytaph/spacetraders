<?php

namespace Jaytaph\Spacetraders\Api\Component;

class Chart
{
    public string $waypointSymbol;
    public string $submittedBy;
    public \DateTime $submittedOn;

    public static function fromJson(array $data): self
    {
        $result = new self();
        $result->waypointSymbol = $data['waypointSymbol'] ?? '';
        $result->submittedBy = $data['submittedBy'];
        $result->submittedOn = new \DateTime($data['submittedOn']);

        return $result;
    }
}
