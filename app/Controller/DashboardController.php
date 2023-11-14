<?php

declare(strict_types=1);

namespace App\Controller;

use App\Repository\PostRepository;

class DashboardController extends Controller
{
  // private PostRepository $repository;

  // public function __construct(PostRepository $repository)
  // {
  //   $this->repository = $repository;
  // }

  public function index(): void
  {
    $this->view('layouts/app', ['data' => 'APENAS UM TESTE']);
  }
}
