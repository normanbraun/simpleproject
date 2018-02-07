<?php

require __DIR__.'/../vendor/autoload.php';

$whoops = new \Whoops\Run();
$whoops->pushHandler(new \Whoops\Handler\PrettyPageHandler());
$whoops->register();

$applicationBootstrap = new \Application\Bootstrap();
$applicationBootstrap->run();
