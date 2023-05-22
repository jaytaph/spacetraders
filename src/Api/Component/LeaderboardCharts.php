<?php

namespace Jaytaph\Spacetraders\Api\Component;

class LeaderboardCharts
{
    public string $agent;
    public int $chartCount;

    public static function fromJson(array $data): self
    {
        $leaderboard = new self();
        $leaderboard->agent = $data['agentSymbol'];
        $leaderboard->chartCount = $data['chartCount'];

        return $leaderboard;
    }
}
