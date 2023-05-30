<?php

namespace Fw;

session_start();

define('BITRIX_CORE', true);

use Fw\Core\Application;

spl_autoload_register(function ($class) {
    $root = $_SERVER['DOCUMENT_ROOT'];
    $class = str_replace("\\", '/', $class);
    $file = $root . "/{$class}.php";
    if (file_exists($file)) {
        require_once $file;
    }
});

$app = Application::getInstance();




