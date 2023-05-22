<?php

namespace Jaytaph\Spacetraders\Api\Component;

class Leaderboard
{
    public string $mostCreditsAgent;
    public string $mostCreditsCredits;
    public string $mostSubmittedChartsAgent;
    public string $mostSubmittedChartsChartCount;

    public static function fromJson(array $data): self
    {
        $leaderboard = new self();
        $leaderboard->mostCreditsAgent = $data['mostCredits']['agent'];
        $leaderboard->mostCreditsCredits = $data['mostCredits']['credits'];
        $leaderboard->mostSubmittedChartsAgent = $data['mostSubmittedCharts']['agent'];
        $leaderboard->mostSubmittedChartsChartCount = $data['mostSubmittedCharts']['chartCount'];

        return $leaderboard;
    }
}
