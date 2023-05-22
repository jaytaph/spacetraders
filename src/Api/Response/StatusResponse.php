<?php

namespace Jaytaph\Spacetraders\Api\Response;

use Jaytaph\Spacetraders\Api\Component\Announcement;
use Jaytaph\Spacetraders\Api\Component\Leaderboards;
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
    public Leaderboards $leaderboards;
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
        $response->resetDate = $data['resetDate'];
        $response->description = $data['description'];
        $response->stats = Stats::fromJson($data['stats']);
        $response->leaderboards = Leaderboards::fromJson($data['leaderboards']);
        $response->serverResets = ServerResets::fromJson($data['serverResets']);
        $response->announcements = array_map(fn ($announcement) => Announcement::fromJson($announcement), $data['announcements']);
        $response->links = array_map(fn ($link) => Link::fromJson($link), $data['links']);

        return $response;
    }
}
