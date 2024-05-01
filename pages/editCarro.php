<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Document</title>

        <link rel="stylesheet" href="../css/style.css">
    </head>
    <body>
        
        <div class="container">
            <header>
                <h1 id="title">carros</h1>
                <div class="navbar">
                    <button onclick="location.href='../pages/index.php';">voltar</button>
                </div>
            </header>
            
            <form class="carForm" name="carForm" action="../scripts/update.php" method="post">

            <?php
            
            if (isset($_GET["id"])) {
    
                $carId = $_GET["id"];
                require '../includes/connection.php';
            
                $sql = "select * from cars where id = ?";
                $stmt = $con->prepare($sql);
                
                if ($stmt) {
                    $stmt->bind_param("i", $carId); // Assuming 'id' is an integer
                    
                    if ($stmt->execute()) {
                        $result = $stmt->get_result();
                        
                        if ($result->num_rows == 1) {
                            $row = $result->fetch_assoc();
                            $marca = $row['marca'];
                            $cor = $row['cor'];
                            $ano = $row['ano'];
                            $preco = $row['preco'];
                        }
                    } else {
                        echo "Execution failed: " . $stmt->error;
                    }
                    
                    $stmt->close();
                } else {
                    echo "Preparation of statement failed: " . $con->error;
                }
            
            }
            
            
            ?>

                <div class="form-group">
                    <label for="make">Marca:</label>
                    <input type="text" id="make" name="make" required value="<?php echo $marca ?>">
                </div>
                <div class="form-group">
                    <label for="color">Cor:</label>
                    <input type="text" id="color" name="color" required value="<?php echo $cor ?>">
                </div>
                <div class="form-group">
                    <label for="year">Ano:</label>
                    <input type="number" id="year" name="year" min="1900" max="2099" required value="<?php echo $ano ?>">
                </div>
                <div class="form-group">
                    <label for="price">Preço:</label>
                    <input type="number" id="price" name="price" min="0" required value="<?php echo $preco ?>">
                </div>
                <div class="form-group buttons">
                    <input type="submit" name="submit" class="addCar" value="Atualizar">
                </div>
                <input type="hidden" name="car_id" value="<?php echo $carId; ?>"> <!-- carId -->
            </form>
            <footer>
                <p>Lucas Braga Santos</p>
            </footer>
        </div>

    </body>
</html>