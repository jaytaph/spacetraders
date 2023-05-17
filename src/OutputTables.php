<?php

namespace Jaytaph\Spacetraders;

use Jaytaph\Spacetraders\Api\Component\Fuel;
use Jaytaph\Spacetraders\Api\Component\Nav;
use Symfony\Component\Console\Helper\Table;
use Symfony\Component\Console\Output\OutputInterface;

class OutputTables {
    protected OutputInterface $output;

    public function __construct(OutputInterface $output)
    {
        $this->output = $output;
    }

    public function outputNavigationTable(Nav $nav)
    {
        $this->output->writeln("System     : <info>" . $nav->system. "</info>");
        $this->output->writeln("Waypoint   : <info>" . $nav->waypoint. "</info>");
        $this->output->writeln("Flightmode : <info>" . $nav->flightmode. "</info>");
        $this->output->writeln("Status     : <info>" . $nav->status. "</info>");
        $this->output->writeln("Route      :");
        $this->output->writeln("  Destination :");
        $this->output->writeln("    Symbol : <info>" . $nav->route->destination->symbol. "</info>");
        $this->output->writeln("    Type   : <info>" . $nav->route->destination->type. "</info>");
        $this->output->writeln("    System : <info>" . $nav->route->destination->system. "</info>");
        $this->output->writeln("    Coord  : <info>" . $nav->route->destination->x . "," . $nav->route->destination->y . "</info>");
        $this->output->writeln("  Depature :");
        $this->output->writeln("    Symbol : <info>" . $nav->route->departure->symbol. "</info>");
        $this->output->writeln("    Type   : <info>" . $nav->route->departure->type. "</info>");
        $this->output->writeln("    System : <info>" . $nav->route->departure->system. "</info>");
        $this->output->writeln("    Coord  : <info>" . $nav->route->departure->x . "," . $nav->route->destination->y . "</info>");
        $this->output->writeln("  Depature time : <info>" . $nav->route->departureTime?->format('d-M-Y h:i:s'). "</info>");
        $this->output->writeln("  Arrival time  : <info>" . $nav->route->arrival?->format('d-M-Y h:i:s'). "</info>");
        $this->output->writeln("");
    }

    public function outputFuelTable(Fuel $fuel)
    {
        $this->output->writeln("Fuel :");
        $this->output->writeln("  Current : <info>" . $fuel->current. "</info>");
        $this->output->writeln("  Capacity : <info>" . $fuel->capacity. "</info>");
        $this->output->writeln("  Consumed : <info>" . $fuel->consumedAmount. "</info>");
        $this->output->writeln("  Timestamp : <info>" . $fuel->consumedTimestamp->format('d-M-Y h:i:s'). "</info>");
        $this->output->writeln("");
    }

    public function outputCargoTable(Api\Component\Cargo $cargo)
    {
        $this->output->writeln("Cargo :");
        $this->output->writeln("  Capacity : <info>" . $cargo->capacity. "</info>");
        $this->output->writeln("  Units    : <info>" . $cargo->units. "</info>");

        $table = new Table($this->output);
        $table->setHeaders([
            'Symbol',
            'Name',
            'Description',
            'Units',
        ]);

        foreach ($cargo->inventory as $inventory) {
            $table->addRow([
                $inventory->symbol,
                $inventory->name,
                wordwrap($inventory->description),
                $inventory->units,
            ]);
        }

        $table->render();

        $this->output->writeln("");
    }
}
