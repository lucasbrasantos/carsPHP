<?php

if (isset($_POST['submit'])) {
    require '../includes/connection.php';
    require '../classes/Car.class.php'; 
    
    // Check if there are no empty required fields
    if (!empty($_POST['make']) && !empty($_POST['color']) && !empty($_POST['year']) && !empty($_POST['price']) && isset($_POST['isUsed'])) {
        $marca = $_POST['make'];
        $cor = $_POST['color'];
        $ano = $_POST['year'];
        $preco = $_POST['price'];
        $usado = $_POST['isUsed'];
        $adicionais = isset($_POST['features']) ? $_POST['features'] : [];

        // Create an instance of the Car class
        $car = new Car();

        // Attempt to create a car
        if ($car->createCar($marca, $cor, $ano, $preco, $usado, $adicionais)) {
            header("Location: ../pages/addCarro.html?success");
            exit();
        } else {
            // Redirect with error message in registration
            header("Location: ../pages/addCarro.html?error=registration");
            exit();
        }
    } else {
        // Redirect with error message if there are empty fields
        header("Location: ../pages/addCarro.html?error=empty_fields");
        exit();
    }
}

?>
