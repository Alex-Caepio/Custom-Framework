<?php

namespace Fw;


use Fw\Core\Application;

session_start();

define('BITRIX_CORE', true);

spl_autoload_register(function ($class) {
    $class = str_replace('\\', '/', $class);
    $file = __DIR__ . '/' . $class . '.php';
    if (file_exists($file)) {
        require_once $file;
    }
});

$app = Application::getInstance();




