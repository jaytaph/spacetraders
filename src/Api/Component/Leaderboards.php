<?php

namespace Jaytaph\Spacetraders\Api\Component;

class Leaderboards
{
    /** @var LeaderboardCredits[] */
    public array $mostCredits;
    /** @var LeaderboardCharts[] */
    public array $mostSubmitted;

    public static function fromJson(array $data): self
    {
        $leaderboards = new self();
        $leaderboards->mostCredits = array_map(fn ($leaderboard) => LeaderboardCredits::fromJson($leaderboard), $data['mostCredits']);
        $leaderboards->mostSubmitted = array_map(fn ($leaderboard) => LeaderboardCharts::fromJson($leaderboard), $data['mostSubmittedCharts']);

        return $leaderboards;
    }
}
