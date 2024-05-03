<?php

if (isset($_POST['submit'])) {
    require '../includes/connection.php';
    require '../classes/Car.php'; // Se necessário, ajuste o caminho
    
    // Verifica se todos os campos obrigatórios foram preenchidos
    if (!empty($_POST['make']) && !empty($_POST['color']) && !empty($_POST['year']) && !empty($_POST['price'])) {
        $marca = $_POST['make'];
        $cor = $_POST['color'];
        $ano = $_POST['year'];
        $preco = $_POST['price'];

        // Create an instance of the Car class
        $car = new Car($pdo);

        // Tentativa de criar um novo carro
        if ($car->createCar($marca, $cor, $ano, $preco)) {
            header("Location: ../pages/addCarro.html?success");
            exit();
        } else {
            // Redireciona com mensagem de erro para produção
            header("Location: ../pages/addCarro.html?error=registration");
            exit();
        }
    } else {
        // Redireciona com mensagem de erro para produção se campos obrigatórios não forem preenchidos
        header("Location: ../pages/addCarro.html?error=empty_fields");
        exit();
    }
}

?>
