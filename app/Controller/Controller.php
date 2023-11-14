<?php

declare(strict_types=1);

namespace App\Controller;

abstract class Controller
{
  public function view(string $view, array $data = [])
  {
    extract($data);
    include dirname(__DIR__, 2)."/views/{$view}.php";
  }
}
