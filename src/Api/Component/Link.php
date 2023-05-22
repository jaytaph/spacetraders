<?php

namespace Jaytaph\Spacetraders\Api\Component;

class Link
{
    public string $name;
    public string $url;

    public static function fromJson(array $data): self
    {
        $link = new self();
        $link->name = $data['name'];
        $link->url = $data['url'];

        return $link;
    }
}
