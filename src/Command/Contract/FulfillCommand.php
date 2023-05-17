<?php

namespace Jaytaph\Spacetraders\Command\Contract;

use Jaytaph\Spacetraders\Api\Api;
use Jaytaph\Spacetraders\Api\Command\Contract\FulfillCommand as ApiFulfillCommand;
use Jaytaph\Spacetraders\Api\Response\Contract\FulfillResponse;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

class FulfillCommand extends Command
{
    protected static $defaultName = 'contract:fulfill';

    protected function configure()
    {
        $this->setDescription('Fulfill a contract')
            ->setHelp('Fulfill a contract')
            ->setDefinition([
                new InputArgument('contract', InputArgument::REQUIRED, 'The contract ID'),
            ])
        ;
    }

    protected function execute(InputInterface $input, OutputInterface $output)
    {
        $api = new Api();
        $command = new ApiFulfillCommand(strval($input->getArgument('contract')));
        $response = $api->execute($command);
        $result = FulfillResponse::fromJson($response->data);

        $output->writeln("Fulfilled contract <info>{$result->contract->id}</info>");

        return Command::SUCCESS;
    }
}
