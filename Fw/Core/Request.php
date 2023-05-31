<?php

namespace Fw\Core;

use Fw\Core\Type\Dictionary as Dictionary;

class Request extends Dictionary
{
    private array $container;

    public function __construct()
    {
        $this->container = $_REQUEST;
        define('readonly', true);
    }
}