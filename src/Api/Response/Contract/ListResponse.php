<?php

namespace Jaytaph\Spacetraders\Api\Response\Contract;

use Jaytaph\Spacetraders\Api\Component\Contract;

class ListResponse
{
    public int $total;
    public int $page;
    public int $limit;
    /** @var Contract[] */
    public array $contracts;

    public static function fromJson(array $data, array $meta): self
    {
        $result = new self();
        $result->total = $meta['total'];
        $result->page = $meta['page'];
        $result->limit = $meta['limit'];
        $result->contracts = array_map(function ($contracts) {
            return Contract::fromJson($contracts);
        }, $data);

        return $result;
    }
}
