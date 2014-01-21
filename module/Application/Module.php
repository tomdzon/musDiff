<?php

namespace Application;

use Phalcon\Mvc\ModuleDefinitionInterface;

class Module implements ModuleDefinitionInterface
{
    public function registerAutoloaders()
    {
        $loader = new \Phalcon\Loader();
        $loader->registerNamespaces([
            'Application' => __DIR__ . '/src',
        ]);
        $loader->register();
    }

    public function getConfig()
    {
        return [
            'router' => [
                'notFoundRoute' => [
                    'module' => 'Application',
                    'namespace' => 'Application\Controller',
                    'controller' => 'index',
                    'action' => 'notFound',
                ],
                'routes' => [
                    /* The route '/' is default route.
                     * If the default route is not specified, the framework
                     * can not determine the route, respectively, module,
                     * controller and action.
                     */
                    '/' => [
                        'route' => '/',
                        'defaults' => [
                            'module' => 'Application',
                            'namespace' => 'Application\Controller',
                            'controller' => 'index',
                            'action' => 'index',
                        ],
                    ],
                    'home' => [
                        'route' => '/:controller/:action',
                        'defaults' => [
                            'module' => 'Application',
                            'namespace' => 'Application\Controller',
                            'controller' => 1,
                            'action' => 2,
                        ],
                    ],
                ],
            ],
            'viewStrategy' => [
                'application' => [ // module name in lowercase
                    'viewDir' => __DIR__ . '/view/templates/',
                    'layoutsDir' => '../layouts/',
                    'defaultLayout' => 'layout',
                ],
            ],
        ];
    }

    public function onBootstrap($application)
    {
        $di = $application->getDI();
        $eventsManager = $application->getEventsManager();
        // your code here
    }

    public function registerServices($di)
    {

    }
}
