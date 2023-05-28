<?php

namespace Fw\Core;


class Config
{
    private static $config;

    public static function init()
    {
        self::$config = require __DIR__ . '/../config.php';
    }

    public static function get(string $path)
    {
        if (is_null(self::$config)) {
            self::init();
        }
        $variables = explode('/', $path);
        $config = self::$config;
        foreach ($variables as $var) {
            if (isset($config[$var])) {
                $config = $config[$var];
            } else {
                return null;
            }
        }

        return $config;
    }
}