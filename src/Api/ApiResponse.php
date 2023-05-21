<?php

namespace Jaytaph\Spacetraders\Api;

use Psr\Http\Message\ResponseInterface;

class ApiResponse
{
    public int $statusCode;         // Returned HTTP status code
    public bool $success;           // True when the call was successful
    public string $errorMessage;    // Option error message when the call was not successful
    public string $content;         // Raw content of the response
    public array $response;         // Actual complete response (meta + data + any other information)
    public array $data;             // Information retrieved from json data
    public array $meta;             // Information retrieved from json meta
    protected ResponseInterface $httpResponse;      // Actual response object from http client

    public static function createFromResponse(ResponseInterface $response): ApiResponse
    {
        $content = $response->getBody()->getContents();
        return new self($response, $response->getStatusCode(), $content);
    }

    public function __construct(ResponseInterface $response, int $statusCode, string $content)
    {
        $this->httpResponse = $response;

        $this->success = $statusCode <= 399;
        $this->statusCode = $statusCode;
        $this->content = $content;

        $json = json_decode($content, true);
        $this->response = is_array($json) ? $json : [];

        if ($this->statusCode >= 400) {
            $this->errorMessage = $json['error']['message'] ?? '';
        } else {
            $this->data = $this->response['data'] ?? [];
            $this->meta = $this->response['meta'] ?? [];
        }
    }
}
