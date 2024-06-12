<?php

class Car {
    private $pdo;

    public function __construct($pdo) {
        $this->pdo = $pdo;
    }

    public function createCar($marca, $cor, $ano, $preco) {
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

    public function readCar($carId) {
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

    public function updateCar($carId, $marca, $cor, $ano, $preco) {
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

    public function deleteCar($carId) {
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

?>
