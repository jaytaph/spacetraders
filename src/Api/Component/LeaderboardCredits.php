<?php

namespace Jaytaph\Spacetraders\Api\Component;

class LeaderboardCredits
{
    public string $agent;
    public int $credits;

    public static function fromJson(array $data): self
    {
        $leaderboard = new self();
        $leaderboard->agent = $data['agentSymbol'];
        $leaderboard->credits = $data['credits'];

        return $leaderboard;
    }
}
