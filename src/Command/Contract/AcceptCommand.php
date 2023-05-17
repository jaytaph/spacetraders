<?php

namespace Jaytaph\Spacetraders\Command\Contract;

use Jaytaph\Spacetraders\Api\Api;
use Jaytaph\Spacetraders\Api\Command\Contract\AcceptCommand as ApiAcceptCommand;
use Jaytaph\Spacetraders\Api\Response\Contract\AcceptResponse;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

class AcceptCommand extends Command
{
    protected static $defaultName = 'contract:accept';

    protected function configure()
    {
        $this->setDescription('Accept an available contract')
            ->setHelp('Accept an available contract')
            ->setDefinition([
                new InputArgument('contract', InputArgument::REQUIRED, 'The contract ID'),
            ])
        ;
    }

    protected function execute(InputInterface $input, OutputInterface $output)
    {
        $api = new Api();
        $command = new ApiAcceptCommand(strval($input->getArgument('contract')));
        $response = $api->execute($command);
        $result = AcceptResponse::fromJson($response->data);

        $output->writeln("Contract <info>{$result->contract->id} accepted by agent {$result->agent->callsign}</info>");

        return Command::SUCCESS;
    }
}
