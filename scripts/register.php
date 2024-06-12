<?php

if (isset($_POST['submit'])) {
    require '../includes/connection.php';
    require '../classes/Car.class.php'; 
    
    // Check if there is no empty fields
    if (!empty($_POST['make']) && !empty($_POST['color']) && !empty($_POST['year']) && !empty($_POST['price'])) {
        $marca = $_POST['make'];
        $cor = $_POST['color'];
        $ano = $_POST['year'];
        $preco = $_POST['price'];

        // Create an instance of the Car class
        $car = new Car();

        // Attempt to create a car
        if ($car->createCar($marca, $cor, $ano, $preco)) {
            header("Location: ../pages/addCarro.html?success");
            exit();
        } else {
            // Redirect with error message in registration
            header("Location: ../pages/addCarro.html?error=registration");
            exit();
        }
    } else {
        // Redirect with error message if there is empty fields
        header("Location: ../pages/addCarro.html?error=empty_fields");
        exit();
    }
}

?>
