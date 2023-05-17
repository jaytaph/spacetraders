<?php

namespace Jaytaph\Spacetraders\Api;

use GuzzleHttp\Psr7\Response;

class ApiResponse
{
    public int $statusCode;
    public array $data;
    public array $meta;
    public array $response;

    public static function createFromResponse(Response $response): ApiResponse
    {
        $content = $response->getBody()->getContents() ?? "";
        return new self($response->getStatusCode(), $content);
    }

    public function __construct(int $statusCode, string $content)
    {
        $this->statusCode = $statusCode;

        $json = json_decode($content, true);
        $this->response = is_array($json) ? $json : [];

        $this->data = $this->response['data'] ?? [];
        $this->meta = $this->response['meta'] ?? [];
    }
}
