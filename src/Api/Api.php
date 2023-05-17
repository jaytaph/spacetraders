<?php

namespace Jaytaph\Spacetraders\Api;

use GuzzleHttp\Client;
use Jaytaph\Spacetraders\Api\Command\Command;
use Jaytaph\Spacetraders\Api\Exception\RateLimitException;
use Jaytaph\Spacetraders\Api\Exception\SpacetradersException;

class Api
{
    protected Client $client;
    protected ?string $auth = null;

    public function __construct(?Client $client = null, bool $retrieveToken = true)
    {
        $this->client = $client ?? new Client([
            'base_uri' => 'https://api.spacetraders.io',
        ]);

        if ($retrieveToken && file_exists('.token')) {
            $token = trim(file_get_contents('.token'));
            $this->setToken($token);
        }
    }

    public function setToken(string $token): void
    {
        $this->auth = $token;
    }

    /**
     * @param Command $command
     * @return mixed[]
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
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

        // Do error checks
        if ($response->getStatusCode() == 429) {
            throw new RateLimitException();
        }

        if ($response->getStatusCode() >= 400) {
            $contents = $response->getBody()->getContents();
            if ($contents == null) {
                throw new SpacetradersException($response->getReasonPhrase(), $response->getStatusCode());
            } else {
                throw new SpacetradersException($contents);
            }
        }

        return ApiResponse::createFromResponse($response);
    }
}
