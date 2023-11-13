<?php

declare(strict_types=1);

namespace App\Connection;

use PDO;
use PDOException;

final class DatabaseConnection
{
  public static function openConnection(): PDO
  {
    $env = "mysql:host={$_ENV['DATABASE_HOST']};dbname={$_ENV['DATABASE_NAME']}";

    try {
      $connection = new PDO($env, $_ENV['DATABASE_USER'], $_ENV['DATABASE_PASS']);
    } catch (PDOException $exception) {
      die('Error Connection: '.$exception->getMessage());
    }

    return $connection;
  }
}
