<?php

namespace Jaytaph\Spacetraders\Api;

use Jaytaph\Spacetraders\Api\Command\Command;

interface ApiInterface
{
    public function execute(Command $command): ApiResponse;
}
