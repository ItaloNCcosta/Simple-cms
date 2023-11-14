<?php

declare(strict_types=1);

namespace App\Repositories;

use App\Connection\DatabaseConnection;
use PDO;

abstract class RepositoryAbstract
{
  private PDO $pdo;

  public function __construct()
  {
    $this->pdo = DatabaseConnection::openConnection();
  }

  public function save(string $table, string $columns, array $values): void
  {

    $query = "INSERT INTO " . $table . "($columns) VALUES('" . implode("', '", $values) . "')";

    $this->pdo->query($query);
  }

  public function update(string $table, array $data, int $id): void
  {
    $formattedData = array_map(
      function ($key, $value) {
        return "$key = '$value'";
      },
      array_keys($data),
      $data
    );

    $query = "UPDATE " . $table . " SET '" . implode(', ', $formattedData) . "' WHERE id = " . $id;

    $this->pdo->query($query);
  }

  public function delete(string $table, int $id, ?bool $softDelete = false): void
  {
    $query = "DELETE FROM " . $table . " WHERE id = " . $id;

    if ($softDelete === true) {
      $query = "UPDATE " . $table . " SET deleted_at = '" . date('Y/m/d h:i:s') . "' WHERE id = " . $id;
    }

    $this->pdo->query($query);
  }
}
