<?php

namespace Fw\Core;

class Config
{
    private static $configuration;

    public static function init()
    {
        require __DIR__ . '/../config.php';
        self::$configuration = $config;
    }

    public static function get(string $path)
    {
        if (is_null(self::$configuration)) {
            self::init();
        }
        $variables = explode('/', $path);
        $config = self::$configuration;
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