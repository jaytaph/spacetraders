<?php

namespace Jaytaph\Spacetraders\Command\System\Waypoint;

use Jaytaph\Spacetraders\Api\Api;
use Jaytaph\Spacetraders\Api\Response\System\Waypoint\ListResponse;
use Jaytaph\Spacetraders\Api\Command\System\Waypoint\ListCommand as ApiListCommand;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Helper\Table;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Output\OutputInterface;

class ListCommand extends Command
{
    protected static $defaultName = 'waypoint:list';

    protected function configure()
    {
        $this->setDescription('Display systems')
            ->setHelp('Display systems')
            ->setDefinition([
                new InputArgument('symbol', InputArgument::REQUIRED, 'Symbol of system to display'),
                new InputOption('page', 'p', InputArgument::OPTIONAL, 'Page number', 1),
                new InputOption('limit', 'l', InputArgument::OPTIONAL, 'Limit', 10),
            ])
        ;
    }

    protected function execute(InputInterface $input, OutputInterface $output)
    {
        $api = new Api();
        $command = new ApiListCommand(
            $input->getArgument('symbol'),
            intval($input->getOption('page')),
            intval($input->getOption('limit'))
        );
        $response = $api->execute($command);
        $result = ListResponse::fromJson($response->data, $response->meta);

        $table = new Table($output);
        $table->setHeaders([
            'Symbol',
            'Type',
            'Coord',
            'Num. orbitals',
            'Faction',
            'Traits',
            'Chart'
        ]);

        foreach ($result->waypoints as $waypoint) {
            $traits = [];
            foreach ($waypoint->traits as $trait) {
                $traits[] = $trait->name;
            }

            $table->addRow([
                $waypoint->symbol,
                $waypoint->type,
                "{$waypoint->x},{$waypoint->y}",
                count($waypoint->orbitals),
                $waypoint->faction,
                join(", ", $traits),
                $waypoint->chart->waypointSymbol,
            ]);
        }

        $table->render();

        return Command::SUCCESS;
    }


}
