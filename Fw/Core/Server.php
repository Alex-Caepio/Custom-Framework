<?php

namespace Fw\Core;

use Fw\Core\Type\Dictionary as Dictionary;

class Server extends Dictionary
{
    private array $container;

    public function __construct()
    {
        $this->container = $_SERVER;
        define('readonly', true);
    }
}