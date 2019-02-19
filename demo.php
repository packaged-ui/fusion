<?php
///    php -S localhost:7777 demo.php

use Cubex\Context\Context;
use Cubex\Cubex;
use Cubex\Routing\Router;
use Packaged\Dispatch\Dispatch;
use PackagedUi\Elegance\Demo\Demo;

$loader = require_once 'vendor/autoload.php';
$launcher = new Cubex(dirname(__DIR__), $loader);
$dispatchPath = '/_r';
Dispatch::bind(new Dispatch(__DIR__, $dispatchPath));

$router = Router::i();
$router->handleFunc($dispatchPath, function (Context $c) { return Dispatch::instance()->handle($c->getRequest()); });
$router->handleFunc("/", function (Context $c) { return (new Demo($c))->render(); });
$launcher->handle($router);
