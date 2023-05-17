<?php

namespace Jaytaph\Spacetraders\Api\Component;

class Ship {
    public string $symbol;
    public Nav $nav;
    public Crew $crew;
    public Fuel $fuel;
    public Frame $frame;
    public Reactor $reactor;
    public Engine $engine;
    /** @var Module[] */
    public array $modules;
    /** @var Mount[] */
    public array $mounts;
    public string $registrationName;
    public string $registrationFaction;
    public string $registrationRole;
    public Cargo $cargo;

    public static function fromJson(array $data): self
    {
        $ship = new self();
        $ship->symbol = $data['symbol'];
        $ship->nav = Nav::fromJson($data['nav']);
        $ship->crew = Crew::fromJson($data['crew']);
        $ship->fuel = Fuel::fromJson($data['fuel']);
        $ship->frame = Frame::fromJson($data['frame']);
        $ship->reactor = Reactor::fromJson($data['reactor']);
        $ship->engine = Engine::fromJson($data['engine']);
        $ship->modules = array_map(function ($module) {
            return Module::fromJson($module);
        }, $data['modules']);
        $ship->mounts = array_map(function ($mount) {
            return Mount::fromJson($mount);
        }, $data['mounts']);
        $ship->registrationName = $data['registration']['name'];
        $ship->registrationFaction = $data['registration']['factionSymbol'];
        $ship->registrationRole = $data['registration']['role'];
        $ship->cargo = Cargo::fromJson($data['cargo']);

        return $ship;
    }
}
