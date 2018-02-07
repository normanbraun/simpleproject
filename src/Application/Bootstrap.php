<?php

namespace Application;

use Pimple;
use Application\Controller;

class Bootstrap
{
    /**
     * @var Pimple\Container
     */
    protected $serviceContainer = [];

    /**
     * Executes application bootstrapping
     */
    public function run()
    {
        $this->serviceContainer = $this->loadServiceContainer();

        $this->route();
    }

    /**
     * Processes the routing
     */
    protected function route()
    {
        $router = $this->serviceContainer['Router.Http'];

        $matchedRoute = $router->match();
        if ($matchedRoute) {
           $this->dispatch($matchedRoute);
        }
    }

    /**
     * Dispatches given route
     *
     * @param array $matchedRoute
     */
    protected function dispatch(array $matchedRoute)
    {
        $explodedTarget = explode(':', $matchedRoute['target'] ?? '');

        $controller = $explodedTarget[0];
        $action     = $explodedTarget[1] ?? null;

        if (is_callable($controller, $action)) {

            $controller = new $controller();
            if ($controller instanceof Controller\AbstractController) {
                $controller->setRouteParams($matchedRoute['params'] ?? []);
                $response = $controller->$action();

                if (!$response) {
                    $response = $controller->getResponse();
                    $response->setStatusCode(500);
                }

                $response->render();
                exit;
            }
        }
    }

    /**
     * Gets DI service container
     *
     * @return Pimple\Container
     */
    protected function loadServiceContainer()
    {
        return require_once __DIR__ . '/../../config/services.config.php';
    }
}