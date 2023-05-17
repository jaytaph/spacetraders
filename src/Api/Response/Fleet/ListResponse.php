<?php

namespace Jaytaph\Spacetraders\Api\Response\Fleet;

use Jaytaph\Spacetraders\Api\Component\Ship;

class ListResponse
{
    public int $total;
    public int $page;
    public int $limit;
    /** @var Ship[] */
    public array $ships;

    public static function fromJson(array $data, array $meta): self
    {
        $result = new self();
        $result->total = $meta['total'];
        $result->page = $meta['page'];
        $result->limit = $meta['limit'];
        $result->ships = array_map(function ($ship) {
            return Ship::fromJson($ship);
        }, $data);

        return $result;
    }
}
