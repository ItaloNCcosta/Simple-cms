<?php

declare(strict_types=1);

namespace App\Connection;

use PDO;
use PDOException;

final class DatabaseConnection
{
  public static function openConnection(): ?PDO
  {
    try {
      $env = "mysql:host={$_ENV['DATABASE_HOST']};dbname={$_ENV['DATABASE_NAME']}";
      $connection = new PDO($env, $_ENV['DATABASE_USER'], $_ENV['DATABASE_PASS']);
      return $connection;
    } catch (PDOException $exception) {
      error_log('Error Connection: ' . $exception->getMessage());
      return null;
    }
  }
}
