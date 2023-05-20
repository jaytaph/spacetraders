<?php

namespace Jaytaph\Spacetraders\Api;

    use Psr\Http\Message\ResponseInterface;

class ApiResponse
{
    public int $statusCode;     // Returned HTTP status code
    public array $data;         // Information retrieved from json data
    public array $meta;         // Information retrieved from json meta
    public array $response;     // Actual complete response (meta + data + any other information)
    public string $content;     // Raw content of the response

    public static function createFromResponse(ResponseInterface $response): ApiResponse
    {
        $content = $response->getBody()->getContents();
        return new self($response->getStatusCode(), $content);
    }

    public function __construct(int $statusCode, string $content)
    {
        $this->statusCode = $statusCode;
        $this->content = $content;

        $json = json_decode($content, true);
        $this->response = is_array($json) ? $json : [];

        $this->data = $this->response['data'] ?? [];
        $this->meta = $this->response['meta'] ?? [];
    }
}
