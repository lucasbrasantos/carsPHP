<?php


if (isset($_POST['submit'])) {
    
    require '../includes/connection.php';


    $marca = $_POST['make'];
    $cor = $_POST['color'];
    $ano = $_POST['year'];
    $preco = $_POST['price'];


    $sql = "insert into cars (marca, cor, ano, preco) values (?,?,?,?);";

    $stmt = $con->prepare($sql);
        
    try {
        $stmt->execute([$marca, $cor, $ano, $preco]);
    } catch (Exception $e) {
        echo "erro";
        header("Location: ../pages/addCarro.html?erroAoAdicionarOsCarros");
        exit();
        
    }
    
    
    header("Location: ../pages/addCarro.html?seccess");
    // header("Location: ./index.php?success");

    
    // echo "eae";
    
}

// echo "eae";




?>