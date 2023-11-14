<?php

use routes\Router;

$router = new Router();

$router->add('/', 'App\Controller\DashboardController@index');

$router->dispatch();
