<?php

namespace Jaytaph\Spacetraders\Api\Command;

class RegisterCommand implements Command
{
    protected string $callsign;
    protected string $faction;
    protected ?string $email;

    public function __construct(string $callsign, string $faction, ?string $email = null)
    {
        $this->callsign = $callsign;
        $this->faction = $faction;
        $this->email = $email;
    }

    public function getMethod(): string
    {
        return 'POST';
    }

    public function getUri(): string
    {
        return '/v2/register';
    }

    public function getJson(): array
    {
        return [
            'symbol' => $this->callsign,
            'faction' => $this->faction,
            'email' => $this->email,
        ];
    }
}
