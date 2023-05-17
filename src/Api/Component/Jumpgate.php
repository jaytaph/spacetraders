<?php

namespace Jaytaph\Spacetraders\Api\Component;

class Jumpgate {
    public int $jumprange;
    public string $faction;
    /** @var Connection[] */
    public array $connections;

    public static function fromJson(array $data): self
    {
        $result = new self();
        $result->jumprange = intval($data['jumpRange']);
        $result->faction = strval($data['faction'] ?? '');
        $result->connections = array_map(function ($connection) {
            return Connection::fromJson($connection);
        }, $data['connections'] ?? []);

        return $result;
    }
}
