<?php

namespace Jaytaph\Spacetraders\Api\Component;

class ShipPurchase
{
    public string $type;
    public string $name;
    public Frame $frame;
    public int $purchasePrice;

    public Reactor $reactor;
    public Engine $engine;
    /** @var Module[] */
    public array $modules;
    /** @var Mount[] */
    public array $mounts;

    public static function fromJson(array $data): self
    {
        $result = new self();
        $result->type = $data['type'];
        $result->name = $data['name'];
        $result->frame = Frame::fromJson($data['frame']);
        $result->purchasePrice = $data['purchasePrice'];
        $result->reactor = Reactor::fromJson($data['reactor']);
        $result->engine = Engine::fromJson($data['engine']);
        $result->modules = array_map(function ($module) {
            return Module::fromJson($module);
        }, $data['modules']);
        $result->mounts = array_map(function ($mount) {
            return Mount::fromJson($mount);
        }, $data['mounts']);

        return $result;
    }
}
