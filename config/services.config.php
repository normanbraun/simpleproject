<?php

$serviceContainer = new Pimple\Container();

$serviceContainer['Application.Config'] = function ($serviceContainer) {
    $config = include __DIR__ . '/application.config.php';
    if (is_readable(__DIR__ . '/application.config.local.php')) {
        $config = array_replace_recursive($config, include __DIR__ . '/application.config.local.php');
    }
    return $config;
};

$serviceContainer['Session.Storage.Default'] = function ($serviceContainer) {
    return new Application\Session\Storage\Http();
};

$serviceContainer['Session.Adapter'] = function ($serviceContainer) {
    $sessionAdapter = new Application\Session\Adapter();
    $sessionAdapter->setSessionStorage($serviceContainer['Session.Storage.Default']);
    return $sessionAdapter;
};

$serviceContainer['Router.Http'] = function ($serviceContainer) {
    $router = new AltoRouter();
    $router->map('GET', '/', 'Application\Controller\IndexController:indexAction', 'home');
    return $router;
};

return $serviceContainer;