<?php

require '../classes/Car.class.php';

// Create an instance of the Car class
$car = new Car();

// Attempt to delete all cars
if ($car->deleteAllCars()) {
    header("Location: ../pages/index.php?allCarsDeleted");
    exit();
} else {
    header("Location: ../pages/index.php?error=deletion");
    exit();
}

?>
