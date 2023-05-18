<?php

namespace Jaytaph\Spacetraders\Api\Response\Fleet;

use Jaytaph\Spacetraders\Api\Component\Agent;
use Jaytaph\Spacetraders\Api\Component\Cargo;
use Jaytaph\Spacetraders\Api\Component\Cooldown;
use Jaytaph\Spacetraders\Api\Component\Extraction;
use Jaytaph\Spacetraders\Api\Component\Ship;
use Jaytaph\Spacetraders\Api\Component\ShipTransaction;
use Jaytaph\Spacetraders\Api\Component\Survey;

class SurveyResponse
{
    public Cooldown $cooldown;
    /** @var Survey[]  */
    public array $surveys;

    public static function fromJson(array $data): self
    {
        $response = new self();

        $response->cooldown = Cooldown::fromJson($data['cooldown']);

        foreach ($data['surveys'] as $survey) {
            $response->surveys[] = Survey::fromJson($survey);
        }

        return $response;
    }
}
