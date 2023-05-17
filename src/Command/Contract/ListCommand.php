<?php

namespace Jaytaph\Spacetraders\Command\Contract;

use Jaytaph\Spacetraders\Api\Api;
use Jaytaph\Spacetraders\Api\Response\Contract\ListResponse;
use Jaytaph\Spacetraders\Api\Command\Contract\ListCommand as ApiListCommand;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Helper\Table;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Output\OutputInterface;

class ListCommand extends Command
{
    protected static $defaultName = 'contract:list';

    protected function configure()
    {
        $this->setDescription('Display contracts')
            ->setHelp('Display contracts')
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
        $table->setHeaders(['ID', 'Type', 'Accepted', 'Fulfilled', 'Expires']);

        foreach ($result->contracts as $contract) {
            $table->addRow([
                $contract->id,
                $contract->type,
                $contract->accepted ? "yes" : "no",
                $contract->fulfilled ? "yes" : "no",
                $contract->expiration->format('Y-m-d H:i:s T'),
            ]);
        }

        $table->render();

        return Command::SUCCESS;
    }


}
