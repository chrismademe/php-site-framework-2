<?php

use Router\Router;
$router = new Router();

/**************************************
 *** Do Trigger: on_router_init     ***
 **************************************/
$triggers->doTrigger('on_router_init');

print_r($router);
echo $router->getRoute();
