<?php

namespace Jaytaph\Spacetraders\Api\Command\Fleet;

use Jaytaph\Spacetraders\Api\Command\Command;
use Jaytaph\Spacetraders\Api\Component\Survey;

class ExtractCommand implements Command
{
    protected string $symbol;
    protected ?Survey $survey;

    public function __construct(string $symbol, ?Survey $survey)
    {
        $this->symbol = $symbol;
        $this->survey = $survey;
    }

    public function getMethod(): string
    {
        return 'POST';
    }

    public function getUri(): string
    {
        return '/v2/my/ships/' . $this->symbol . '/extract';
    }

    public function getJson(): array
    {
        if (!$this->survey) {
            return [];
        }

        $deposits = [];
        foreach ($this->survey->deposits as $deposit) {
            $deposits[] = [
                'symbol' => $deposit,
            ];
        }

        return [
            'survey' => [
                'signature' => $this->survey->signature,
                'symbol' => $this->survey->symbol,
                'deposits' => $deposits,
                'expiration' => $this->survey->expiration->format('Y-m-d\TH:i:s.v\Z'),
                'size' => $this->survey->size,
            ]
        ];
    }
}
