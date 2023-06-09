<?php

namespace Jaytaph\Spacetraders\Api;

use GuzzleHttp\Client;
use Jaytaph\Spacetraders\Api\Command\Command;
use Jaytaph\Spacetraders\Api\Exception\RateLimitException;
use Jaytaph\Spacetraders\Api\Exception\SpacetradersException;

class Api implements ApiInterface
{
    protected Client $client;
    protected ?string $auth = null;

    public function __construct(?Client $client = null, string $token = null)
    {
        $this->client = $client ?? new Client([
            'base_uri' => 'https://api.spacetraders.io',
        ]);

        if ($token) {
            $this->setToken($token);
        }
    }

    public function setToken(string $token): void
    {
        $this->auth = $token;
    }

    public function execute(Command $command): ApiResponse
    {
        $options = [
            'http_errors' => false,
            'debug' => false,
            'verbose' => false,
            'timeout' => 30,
            'connect_timeout' => 10,
            'headers' => [
                'Accept' => 'application/json',
                'Content-Type' => 'application/json',
            ],
        ];

        if ($command->getJson()) {
            $options['json'] = $command->getJson();
        }

        if ($this->auth !== null) {
            $options['headers']['Authorization'] = 'Bearer ' . $this->auth;
        }

        $response = $this->client->request($command->getMethod(), $command->getUri(), $options);
        return ApiResponse::createFromResponse($response);
    }
}
