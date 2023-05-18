<?php

namespace Jaytaph\Spacetraders\Api\Component;

class Route
{
    public RoutePoint $departure;
    public RoutePoint $destination;
    public ?\DateTime $departureTime;
    public ?\DateTime $arrival;

    public static function fromJson(array $data): self
    {
        $result = new self();
        $result->departure = RoutePoint::fromJson($data['departure']);
        $result->destination = RoutePoint::fromJson($data['destination']);
        $result->departureTime = isset($data['departureTime']) ? new \DateTime($data['departureTime']) : null;
        $result->arrival = isset($data['arrival']) ? new \DateTime($data['arrival']) : null;

        return $result;
    }
}
