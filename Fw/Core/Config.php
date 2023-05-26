<?php

namespace Fw\Core;

class Config
{
    private static $config;
    public static function get(string $path)
    {
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