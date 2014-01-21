<?php

return [
    'modulePaths' => [
        './module/',
        './vendor/',
    ],
    'modules' => [
        'Application',
    ],
    'configGlobPaths' => [
        'config/autoload/{,*.}{global,local}.php',
    ],
    'configCache' => [
        'enabled' => false, // enable or disable configuration caching
        'lifetime' => 86400, // 24 hours
        'storage' => [
            'class' => 'Phalcon\Cache\Backend\File',
            'options' => [
                'cacheDir' => './data/cache/',
            ],
        ],
    ],
    'viewStrategyClass' => 'Core\Mvc\DefaultViewStrategy',
    'application' => [
        'libraryDir' => APPLICATION_PATH . '/library/',
    ],
];
