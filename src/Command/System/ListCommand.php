<?php

namespace Jaytaph\Spacetraders\Command\System;

use Jaytaph\Spacetraders\Api\Api;
use Jaytaph\Spacetraders\Api\Response\System\ListResponse;
use Jaytaph\Spacetraders\Api\Command\System\ListCommand as ApiListCommand;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Helper\Table;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Output\OutputInterface;

class ListCommand extends Command
{
    protected static $defaultName = 'systems:list';

    protected function configure()
    {
        $this->setDescription('Display systems')
            ->setHelp('Display systems')
            ->setDefinition([
                new InputOption('page', 'p', InputArgument::OPTIONAL, 'Page number', 1),
                new InputOption('limit', 'l', InputArgument::OPTIONAL, 'Limit', 10),
            ])
        ;
    }

    protected function execute(InputInterface $input, OutputInterface $output)
    {
        $api = new Api();
        $command = new ApiListCommand(
            intval($input->getOption('page')),
            intval($input->getOption('limit'))
        );
        $response = $api->execute($command);
        $result = ListResponse::fromJson($response->data, $response->meta);

        $table = new Table($output);
        $table->setHeaders([
            'Symbol',
            'Sector',
            'Type',
            'Coord',
            'Num. Waypoints',
            'Factions'
        ]);

        foreach ($result->systems as $system) {
            $table->addRow([
                $system->symbol,
                $system->sectorSymbol,
                $system->type,
                "{$system->x},{$system->y}",
                count($system->waypoints),
                join(', ', $system->factions)
            ]);
        }

        $table->render();

        return Command::SUCCESS;
    }


}
