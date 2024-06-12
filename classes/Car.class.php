<?php

require "Database.class.php";

class Car extends Database
{
  public function createCar(string $marca, string $cor, int $ano, float $preco): bool
  {
    $sql = "INSERT INTO cars (marca, cor, ano, preco) VALUES (?, ?, ?, ?)";
    $stmt = $this->pdo->prepare($sql);
    try {
      $stmt->execute([$marca, $cor, $ano, $preco]);
      return true;
    } catch (PDOException $e) {
      // Log detailed error for development
      error_log("Error in creating car: " . $e->getMessage());
      return false;
    }
  }

  public function readCar(int $carId): ?array
  {
    $sql = "SELECT * FROM cars WHERE id = ?";
    $stmt = $this->pdo->prepare($sql);
    try {
      $stmt->execute([$carId]);
      return $stmt->fetch(PDO::FETCH_ASSOC);
    } catch (PDOException $e) {
      // Log detailed error for development
      error_log("Error in reading car: " . $e->getMessage());
      return null;
    }
  }

  public function updateCar(int $carId, string $marca, string $cor, int $ano, float $preco): bool
  {
    $sql = "UPDATE cars SET marca = ?, cor = ?, ano = ?, preco = ? WHERE id = ?";
    $stmt = $this->pdo->prepare($sql);
    try {
      $stmt->execute([$marca, $cor, $ano, $preco, $carId]);
      return true;
    } catch (PDOException $e) {
      // Log detailed error for development
      error_log("Error in updating car: " . $e->getMessage());
      return false;
    }
  }

  public function deleteCar(int $carId): bool
  {
    $sql = "DELETE FROM cars WHERE id = ?";
    $stmt = $this->pdo->prepare($sql);
    try {
      $stmt->execute([$carId]);
      return true;
    } catch (PDOException $e) {
      // Log detailed error for development
      error_log("Error in deleting car: " . $e->getMessage());
      return false;
    }
  }
}
