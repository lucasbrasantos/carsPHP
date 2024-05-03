<?php

if (isset($_POST['submit'])) {
    require '../includes/connection.php';
    require '../classes/Car.php'; // Se necessário, ajuste o caminho
    
    // Verifica se todos os campos obrigatórios foram preenchidos
    if (!empty($_POST['make']) && !empty($_POST['color']) && !empty($_POST['year']) && !empty($_POST['price'])) {
        $carId = $_POST['car_id'];
        $marca = $_POST['make'];
        $cor = $_POST['color'];
        $ano = $_POST['year'];
        $preco = $_POST['price'];

        // Create an instance of the Car class
        $car = new Car($pdo);

        // Tentativa de atualizar o carro
        if ($car->updateCar($carId, $marca, $cor, $ano, $preco)) {
            header("Location: ../pages/index.php?carUpdated");
            exit();
        } else {
            // Redireciona com mensagem de erro para produção
            header("Location: ../pages/index.php?error=update");
            exit();
        }
    } else {
        // Redireciona com mensagem de erro para produção se campos obrigatórios não forem preenchidos
        header("Location: ../pages/index.php?error=empty_fields");
        exit();
    }
}

?>
