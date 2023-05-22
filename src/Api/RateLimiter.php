<?php

namespace Jaytaph\Spacetraders\Api;

use Jaytaph\Spacetraders\Api\Command\Command;

/**
 * This is a wrapper around the API that handles rate limiting.
 *
 * If the API returns a 429 response, it will wait until the rate limit resets
 * and continues with the call.
 */
class RateLimiter implements ApiInterface
{
    protected ApiInterface $api;

    public function __construct(ApiInterface $api)
    {
        $this->api = $api;
    }

    public function execute(Command $command): ApiResponse
    {
        // Failsafe to prevent infinite loops
        $failSafe = 100;

        // Repeat until we get a response that is not a rate limit error.
        while ($failSafe) {
            $failSafe--;

            $response = $this->api->execute($command);
            if ($response->httpResponse->getStatusCode() !== 429) {
                return $response;
            }

            // Calculate how long we need to wait for the rate limit to reset
            $expires = new \DateTime($response->httpResponse->getHeader('x-ratelimit-reset')[0]);
            $diff = (new \DateTime())->diff($expires);
            $throttle = $diff->s * 1000000 + $diff->f;

            usleep($throttle);
        }

        throw new \Exception("Failsafe in rate limitter triggered");
    }
}


