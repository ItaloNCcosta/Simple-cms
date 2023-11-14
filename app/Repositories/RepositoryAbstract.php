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

  public function save(string $table, array $columns, array $values): void
  {
      $columnNames = implode(', ', $columns);
      $placeholders = rtrim(str_repeat('?, ', count($columns)), ', ');
  
      $query = "INSERT INTO $table ($columnNames) VALUES ($placeholders)";
      $stmt = $this->pdo->prepare($query);
      $stmt->execute($values);
  }
  
  public function update(string $table, array $data, int $id): void
  {
      $formattedData = array_map(
          function ($key, $value) {
              return "$key = ?";
          },
          array_keys($data),
          $data
      );
  
      $query = "UPDATE $table SET " . implode(', ', $formattedData) . " WHERE id = ?";
      $values = array_merge(array_values($data), [$id]);
  
      $stmt = $this->pdo->prepare($query);
      $stmt->execute($values);
  }
  
  public function delete(string $table, int $id, ?bool $softDelete = false): void
  {
      if ($softDelete === true) {
          $query = "UPDATE $table SET deleted_at = ? WHERE id = ?";
          $values = [date('Y/m/d h:i:s'), $id];
      } else {
          $query = "DELETE FROM $table WHERE id = ?";
          $values = [$id];
      }
  
      $stmt = $this->pdo->prepare($query);
      $stmt->execute($values);
  }
}
