<?php

namespace Jaytaph\Spacetraders\Api\Response;

use Jaytaph\Spacetraders\Api\Component\Announcement;
use Jaytaph\Spacetraders\Api\Component\Leaderboard;
use Jaytaph\Spacetraders\Api\Component\Link;
use Jaytaph\Spacetraders\Api\Component\ServerResets;
use Jaytaph\Spacetraders\Api\Component\Stats;

class StatusResponse
{
    public string $status;
    public string $version;
    public string $resetDate;
    public string $description;
    public Stats $stats;
    public Leaderboard $leaderboard;
    public ServerResets $serverResets;
    /** @var Announcement[] Announcements */
    public array $announcements;
    /** @var Link[] */
    public array $links;

    public static function fromJson(array $data): self
    {
        $response = new self();
        $response->status = $data['status'];
        $response->version = $data['version'];
        $response->resetDate = $data['reset']['date'];
        $response->description = $data['description'];
        $response->stats = Stats::fromJson($data['stats']);
        $response->leaderboard = Leaderboard::fromJson($data['leaderboard']);
        $response->serverResets = ServerResets::fromJson($data['serverResets']);
        $response->announcements = array_map(fn ($announcement) => Announcement::fromJson($announcement), $data['announcements']);
        $response->links = array_map(fn ($link) => Link::fromJson($link), $data['links']);

        return $response;
    }
}
