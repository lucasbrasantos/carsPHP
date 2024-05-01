<?php

if (isset($_GET["id"])) {
    
    $carId = $_GET["id"];
    require '../includes/connection.php';

    $sql = "delete from cars where id = ?";
    $stmt = $con->prepare($sql);
    
    try {
        $stmt->execute([$carId]);
    } catch (Exception $e) {
        echo "erro";
        header("Location: ../pages/addCarro.html?erroExcluirCarro");
        exit();
        
    }

    header("Location: ../pages/index.php?carDeleted");

}


?>