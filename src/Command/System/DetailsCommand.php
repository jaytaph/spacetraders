<?php

namespace Jaytaph\Spacetraders\Command\System;

use Jaytaph\Spacetraders\Api\Api;
use Jaytaph\Spacetraders\Api\Command\System\DetailCommand;
use Jaytaph\Spacetraders\Api\Response\System\DetailResponse;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Helper\Table;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

class DetailsCommand extends Command
{
    protected static $defaultName = 'system:details';

    protected function configure()
    {
        $this->setDescription('Display faction details')
            ->setHelp('Display faction details')
            ->setDefinition([
                'system' => new InputArgument('system', InputArgument::REQUIRED, 'The system symbol'),
            ])
        ;
    }

    protected function execute(InputInterface $input, OutputInterface $output)
    {
        $api = new Api();
        $command = new DetailCommand(strval($input->getArgument('system')));
        $response = $api->execute($command);
        $result = DetailResponse::fromJson($response->data);

        $output->writeln("System Details");
        $output->writeln("==============");
        $output->writeln("Symbol   : <info>" . $result->system->symbol . "</info>");
        $output->writeln("Sector   : <info>" . $result->system->sectorSymbol . "</info>");
        $output->writeln("Type     : <info>" . $result->system->type. "</info>");
        $output->writeln("Coords   : <info>" . $result->system->x . "," . $result->system->y . "</info>");
        $output->writeln("Factions : <info>" . join(", ", $result->system->factions) . "</info>");

        $table = new Table($output);
        $table->setHeaders([
            'System',
            'Type',
            'Coord',
        ]);

        foreach ($result->system->waypoints as $waypoint) {
            $table->addRow([
                $waypoint->symbol,
                $waypoint->type,
                "{$waypoint->x},{$waypoint->y}",
            ]);
        }

        $table->render();

        return Command::SUCCESS;
    }


}
