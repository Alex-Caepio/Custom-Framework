<?php

namespace Fw\Core;

use Fw\Core\Type\Dictionary;

class Session extends Dictionary
{
    private array $container;

    public function __construct()
    {
        $this->container = $_SESSION;
        define('readonly', false);
    }
}