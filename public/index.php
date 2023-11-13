<?php

use Symfony\Component\Dotenv\Dotenv;

include_once dirname(__DIR__) . '/vendor/autoload.php';

$dotenv = new Dotenv();
$dotenv->load(dirname(__DIR__) . '/.env');

ini_set('display_errors', $_ENV["ERRORS"]);


class Router
{
  private $rotas = [];

  public function add($rota, $controlador)
  {
    $this->rotas[$rota] = $controlador;
  }

  public function dispatch()
  {
    $uri = $_SERVER['REQUEST_URI'];

    if (array_key_exists($uri, $this->rotas)) {
      list($controlador, $metodo) = explode('@', $this->rotas[$uri]);
      $controladorObj = new $controlador();
      $controladorObj->$metodo();
    } else {
      echo "Page not found";
    }
  }
}
$route = new Router;

$route->add('/', 'App\Controller\DashboardController@index');

$route->dispatch();
