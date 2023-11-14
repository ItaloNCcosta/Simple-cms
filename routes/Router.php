<?php

declare(strict_types=1);

namespace routes;

use App\Controller\Errors\PageNotFoundController;

class Router
{
  private $rotas = [];

  public function add(string $rota, string $controlador): void
  {
    $this->rotas[$rota] = $controlador;
  }

  public function dispatch(): void
  {
    $uri = $_SERVER['REQUEST_URI'];

    if (array_key_exists($uri, $this->rotas)) {
      list($controlador, $metodo) = explode('@', $this->rotas[$uri]);
      $controladorObj = new $controlador();
      $controladorObj->$metodo();
    } else {
      (new PageNotFoundController())->error();
    }
  }
}
