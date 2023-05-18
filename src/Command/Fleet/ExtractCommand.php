<?php

namespace Jaytaph\Spacetraders\Command\Fleet;

use Jaytaph\Spacetraders\Api\Api;
use Jaytaph\Spacetraders\Api\Response\Fleet\ExtractResponse;
use Jaytaph\Spacetraders\Api\Command\Fleet\ExtractCommand as ApiExtractCommand;
use Jaytaph\Spacetraders\OutputTables;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

class ExtractCommand extends Command
{
    protected static $defaultName = 'fleet:extract';

    protected function configure()
    {
        $this->setDescription('Extract minirals')
            ->setHelp('Extract minirals')
            ->setDefinition([
                new InputArgument('ship', InputArgument::REQUIRED, 'The ship symbol'),
            ])
        ;
    }

    protected function execute(InputInterface $input, OutputInterface $output)
    {
        $api = new Api();
        $command = new ApiExtractCommand(strval($input->getArgument('ship')));
        $response = $api->execute($command);
        $result = ExtractResponse::fromJson($response->data);

        $output->writeln("Ship is extracting ores");

        $output->writeln("Cooldown Details");
        $output->writeln("================");
        $output->writeln("Symbol          : <info>" . $result->cooldown->shipSymbol . "</info>");
        $output->writeln("Total seconds   : <info>" . $result->cooldown->totalSeconds. "</info>");
        $output->writeln("Total remaining : <info>" . $result->cooldown->remainingSeconds. "</info>");
        $output->writeln("Expiration      : <info>" . $result->cooldown->expiration->format('Y-m-d H:i:s'). "</info>");

        $output->writeln("Extraction Details");
        $output->writeln("==================");
        $output->writeln("Symbol : <info>" . $result->extration->shipSymbol . "</info>");
        $output->writeln("Yield  : <info>" . $result->extration->yieldSymbol . "</info>");
        $output->writeln("Units  : <info>" . $result->extration->yieldUnits . "</info>");

        $output->writeln("Cargo Details");
        $output->writeln("=============");

        OutputTables::displayCargo($output, $result->cargo);

        return Command::SUCCESS;
    }
}
