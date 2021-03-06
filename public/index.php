<?php

defined('APPLICATION_PATH') || define('APPLICATION_PATH', realpath(__DIR__ . '/..'));
defined('VENDOR_PATH') || define('VENDOR_PATH', realpath(__DIR__ . '/../vendor'));
defined('PUBLIC_PATH') || define('PUBLIC_PATH', __DIR__);

if (!extension_loaded('phalcon')) {
    exit('Phalcon extension is not installed. See http://phalconphp.com/en/download');
}

// \Phalcon\Version::get();

chdir(dirname(__DIR__));
require 'init_autoloader.php';

// Decline static file requests back to the PHP built-in webserver
if (php_sapi_name() === 'cli-server' && is_file(__DIR__ . parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH))) {
    return false;
}

use Core\Mvc\Application;

// TODO: remove me!
Application::setDebugMode(true);

$application = Application::init(require './config/application.config.php');
echo $application->handle()->getContent();
