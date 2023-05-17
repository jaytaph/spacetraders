<?php

namespace Jaytaph\Spacetraders\Command\Fleet;

use Jaytaph\Spacetraders\Api\Api;
use Jaytaph\Spacetraders\Api\Command\Fleet\NavDetailCommand;
use Jaytaph\Spacetraders\Api\Component\Nav;
use Jaytaph\Spacetraders\Api\Response\Fleet\NavDetailResponse;
use Jaytaph\Spacetraders\OutputTables;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

class NavDetailsCommand extends Command
{
    protected static $defaultName = 'fleet:details:nav';

    protected function configure()
    {
        $this->setDescription('Display ship nav details')
            ->setHelp('Display ship nav details')
            ->setDefinition([
                new InputArgument('ship', InputArgument::REQUIRED, 'The ship symbol'),
            ])
        ;
    }

    protected function execute(InputInterface $input, OutputInterface $output)
    {
        $api = new Api();
        $command = new NavDetailCommand(strval($input->getArgument('ship')));
        $response = $api->execute($command);
        $result = NavDetailResponse::fromJson($response->data);

        $output->writeln("Ship Nav Details");
        $output->writeln("=================");

        $this->displayNavigation($output, $result->nav);

        return Command::SUCCESS;
    }

    protected function displayNavigation(OutputInterface $output, Nav $nav)
    {
        $helper = new OutputTables($output);
        $helper->outputNavigationTable($nav);
    }
}
