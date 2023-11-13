<?php

declare(strict_types=1);

namespace App\Controller\Errors;

use App\Controller\Controller;

class PageNotFoundController extends Controller
{
  public function error(): void
  {
    $this->view('errors/notFound');
  }
}