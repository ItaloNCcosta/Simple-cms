<?php

declare(strict_types=1);

use routes\Router;

$router = new Router();

$router->add('/', 'DashboardController@index');

$router->dispatch();