<?php

declare(strict_types=1);

namespace App\Controller;

use Exception;

abstract class Controller
{
  public function view(string $view, array $data = []): void
  {
    $viewPath = "../views/{$view}.php";

    if (!file_exists($viewPath)) {
      throw new Exception("Pagina não encontrado.", 404);
    }

    extract($data);
    include $viewPath;
  }
}
