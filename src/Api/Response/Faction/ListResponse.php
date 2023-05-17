<?php

namespace Jaytaph\Spacetraders\Api\Response\Faction;

use Jaytaph\Spacetraders\Api\Component\Faction;

class ListResponse
{
    public int $total;
    public int $page;
    public int $limit;
    /** @var Faction[] */
    public array $factions;

    public static function fromJson(array $data, array $meta): self
    {
        $result = new self();
        $result->total = $meta['total'];
        $result->page = $meta['page'];
        $result->limit = $meta['limit'];
        $result->factions = array_map(function ($faction) {
            return Faction::fromJson($faction);
        }, $data);

        return $result;
    }
}
