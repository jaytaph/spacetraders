<?php

namespace Jaytaph\Spacetraders\Command\Fleet;

use Jaytaph\Spacetraders\Api\Component\Survey;
use Jaytaph\Spacetraders\Api\Response\Fleet\SurveyResponse;
use Jaytaph\Spacetraders\Api\Command\Fleet\SurveyCommand as ApiSurveyCommand;
use Jaytaph\Spacetraders\Command\BaseCommand;
use Jaytaph\Spacetraders\OutputTables;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

class SurveyCommand extends BaseCommand
{
    protected static $defaultName = 'fleet:survey';

    protected function configure(): void
    {
        $this->setDescription('Create a survey')
            ->setHelp('Create a survey')
            ->setDefinition([
                new InputArgument('ship', InputArgument::REQUIRED, 'The ship symbol'),
            ])
        ;
    }

    protected function execute(InputInterface $input, OutputInterface $output)
    {
        $api = $this->getApi();
        $command = new ApiSurveyCommand(strval($input->getArgument('ship')));
        $response = $api->execute($command);
        $result = SurveyResponse::fromJson($response->data);

        OutputTables::displaySurveys($output, $result->surveys);

        $surveys = json_decode(@file_get_contents(".surveys.json"), true);
        if (! is_array($surveys)) {
            $surveys = [];
        }
        $surveys = array_merge($surveys, $result->surveys);
        file_put_contents(".surveys.json", json_encode($surveys, JSON_PRETTY_PRINT));

        return Command::SUCCESS;
    }
}
