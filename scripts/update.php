<?php
if (isset($_POST['submit'])) {
    require '../includes/connection.php';

    $carId = $_POST['car_id'];
    $marca = $_POST['make'];
    $cor = $_POST['color'];
    $ano = $_POST['year'];
    $preco = $_POST['price'];

    $sql = "UPDATE cars SET marca = ?, cor = ?, ano = ?, preco = ? WHERE id = ?";
    $stmt = $con->prepare($sql);

    try {
        $stmt->execute([$marca, $cor, $ano, $preco, $carId]);
        header("Location: ../pages/index.php?success");
        exit();
    } catch (Exception $e) {
        echo "Erro: " . $e->getMessage();
        header("Location: ..pages/editCarro.php?id=$carId&error=1");
        exit();
    }
}
?>
