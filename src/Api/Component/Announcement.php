<?php

namespace Jaytaph\Spacetraders\Api\Component;

class Announcement
{
    public string $title;
    public string $body;

    public static function fromJson(array $data): self
    {
        $announcement = new self();
        $announcement->title = $data['title'];
        $announcement->body = $data['body'];

        return $announcement;
    }
}
