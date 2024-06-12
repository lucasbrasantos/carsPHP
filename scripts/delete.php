<?php

require '../classes/Car.class.php'; 

if (isset($_GET["id"])) {
    $carId = $_GET["id"];

    // Create an instance of the Car class
    $car = new Car();

    // Attempt to delete the car
    if ($car->deleteCar($carId)) {
        header("Location: ../pages/index.php?carDeleted");
        exit();
    } else {
        header("Location: ../pages/index.php?error=deletion");
        exit();
    }
}

?>
