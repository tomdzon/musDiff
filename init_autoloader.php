<?php

if (file_exists('vendor/autoload.php')) {
    $loader = include 'vendor/autoload.php';
    $loader->add('Core', __DIR__ . '/vendor/Core');
    return;
}

$loader = new \Phalcon\Loader();
$loader->registerDirs([__DIR__ . '/vendor'])->register();
