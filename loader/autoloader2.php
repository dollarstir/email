<?php

// require __DIR__.'/../core/includes.php';
// require __DIR__.'/../core/include.php';
//  Config::init();

spl_autoload_register(function ($class) {
    $path = __DIR__.'/../core/'.strtolower(str_replace('\\', '/', $class)).'.php';
    if (!file_exists($path)) {
        $path = __DIR__.'/../core/uielements/'.strtolower(str_replace('\\', '/', $class)).'.php';
    }

    require $path;
});


