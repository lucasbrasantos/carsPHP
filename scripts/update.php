<?php

if (isset($_POST['submit'])) {
    require '../includes/connection.php';
    require '../classes/Car.class.php'; 
    
    // Check if there are no empty fields
    if (!empty($_POST['make']) && !empty($_POST['color']) && !empty($_POST['year']) && !empty($_POST['price']) && isset($_POST['isUsed'])) {
        $carId = $_POST['car_id'];
        $marca = $_POST['make'];
        $cor = $_POST['color'];
        $ano = $_POST['year'];
        $preco = $_POST['price'];
        $usado = $_POST['isUsed'];
        $adicionais = isset($_POST['features']) ? json_encode($_POST['features']) : json_encode([]);

        // Create an instance of the Car class
        $car = new Car();

        // Tentativa de atualizar o carro
        if ($car->updateCar($carId, $marca, $cor, $ano, $preco, $usado, $adicionais)) {
            header("Location: ../pages/index.php?carUpdated");
            exit();
        } else {
            // Redirect with error message in update
            header("Location: ../pages/index.php?error=update");
            exit();
        }
    } else {
        // Redirect with error message if there are empty fields
        header("Location: ../pages/index.php?error=empty_fields");
        exit();
    }
}

?>
