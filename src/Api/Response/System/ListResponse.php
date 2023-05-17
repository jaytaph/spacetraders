<?php

namespace Jaytaph\Spacetraders\Api\Response\System;

use Jaytaph\Spacetraders\Api\Component\System;

class ListResponse
{
    public int $total;
    public int $page;
    public int $limit;
    /** @var System[] */
    public array $systems;

    public static function fromJson(array $data, array $meta): self
    {
        $result = new self();
        $result->total = $meta['total'];
        $result->page = $meta['page'];
        $result->limit = $meta['limit'];
        $result->systems = array_map(function ($system) {
            return System::fromJson($system);
        }, $data);

        return $result;
    }
}
