<?php

namespace Fw\Core;


class Application
{
    private $pager = null; // будет объект класса
    private static $instance = null;
    private $template = null;//будет объект класса

    private function __construct()
    {
    }

    public static function getInstance()
    {
        if (is_null(self::$instance)) {
            self::$instance = new Application();
        }
        return self::$instance;
    }
}



