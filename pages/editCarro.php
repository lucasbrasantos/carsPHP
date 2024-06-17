<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Editar Carro</title>
        <link rel="stylesheet" href="../css/style.css">
    </head>
    <body>
        <header>
            <h1 id="title">Editar Carro</h1>
            <div class="navbar">
                <button onclick="location.href='../pages/index.php';">Voltar</button>
            </div>
        </header>

        <?php
        require '../includes/connection.php';

        if (isset($_GET["id"])) {
            $carId = $_GET["id"];

            $sql = "SELECT * FROM cars WHERE id = ?";
            $stmt = $pdo->prepare($sql);

            try {
                $stmt->execute([$carId]);
                $row = $stmt->fetch(PDO::FETCH_ASSOC);

                if ($row) {
                    $marca = $row['marca'];
                    $cor = $row['cor'];
                    $ano = $row['ano'];
                    $preco = $row['preco'];
                    $usado = $row['usado'];
                    $adicionais = json_decode($row['adicionais']);
                } else {
                    echo "<p>Nenhum registro encontrado.</p>";
                }
            } catch (PDOException $e) {
                echo "<p>Ocorreu um erro ao buscar os dados do carro.</p>";
                // For development purposes, you can display the detailed error message:
                // echo "Error: " . $e->getMessage();
            }
        } else {
            echo "<p>Nenhum ID de carro fornecido.</p>";
        }
        ?>

        <form class="carForm" name="carForm" action="../scripts/update.php" method="post">
            <div class="form-group">
                <label for="make">Marca:</label>
                <input type="text" id="make" name="make" required value="<?php echo isset($marca) ? htmlspecialchars($marca) : ''; ?>">
            </div>
            <div class="form-group">
                <label for="color">Cor:</label>
                <input type="text" id="color" name="color" required value="<?php echo isset($cor) ? htmlspecialchars($cor) : ''; ?>">
            </div>
            <div class="form-group">
                <label for="year">Ano:</label>
                <input type="number" id="year" name="year" min="1900" max="2099" required value="<?php echo isset($ano) ? htmlspecialchars($ano) : ''; ?>">
            </div>
            <div class="form-group">
                <label for="price">Preço:</label>
                <input type="number" id="price" name="price" min="0" required value="<?php echo isset($preco) ? htmlspecialchars($preco) : ''; ?>">
            </div>
            <div class="form-group radio-checkbox-group">
                <div class="col1">                
                    <label>Usado:</label>
                    <div class="items">
                        <label for="isUsed_sim">
                            <input type="radio" id="isUsed_sim" name="isUsed" value="sim" <?php echo (isset($usado) && $usado == 'sim') ? 'checked' : ''; ?> required> Sim
                        </label>
                        <label for="isUsed_nao">
                            <input type="radio" id="isUsed_nao" name="isUsed" value="não" <?php echo (isset($usado) && $usado == 'não') ? 'checked' : ''; ?> required> Não
                        </label>
                    </div>
                </div>
                <div class="col2"> 
                    <label>Adicionais:</label>
                    <div class="items">
                        <label><input type="checkbox" name="features[]" value="Vidro com insulfilm" <?php echo (isset($adicionais) && in_array('Vidro com insulfilm', $adicionais)) ? 'checked' : ''; ?>>Vidro com insulfilm</label>
                        <label><input type="checkbox" name="features[]" value="Peças originais" <?php echo (isset($adicionais) && in_array('Peças originais', $adicionais)) ? 'checked' : ''; ?>>Peças originais</label>
                        <label><input type="checkbox" name="features[]" value="Possui tela touch" <?php echo (isset($adicionais) && in_array('Possui tela touch', $adicionais)) ? 'checked' : ''; ?>>Possui tela touch</label>
                        <label><input type="checkbox" name="features[]" value="Estofado de couro" <?php echo (isset($adicionais) && in_array('Estofado de couro', $adicionais)) ? 'checked' : ''; ?>>Estofado de couro</label>
                        <label><input type="checkbox" name="features[]" value="Airbag" <?php echo (isset($adicionais) && in_array('Airbag', $adicionais)) ? 'checked' : ''; ?>>Airbag</label>
                        <label><input type="checkbox" name="features[]" value="Tração4x4" <?php echo (isset($adicionais) && in_array('Tração4x4', $adicionais)) ? 'checked' : ''; ?>>Tração 4x4</label>
                        <label><input type="checkbox" name="features[]" value="GPS" <?php echo (isset($adicionais) && in_array('GPS', $adicionais)) ? 'checked' : ''; ?>>GPS</label>
                    </div>
                </div>
            </div>
            <div class="form-group buttons">
                <input type="submit" name="submit" class="addCar" value="Atualizar">
            </div>
            <input type="hidden" name="car_id" value="<?php echo isset($carId) ? htmlspecialchars($carId) : ''; ?>">
        </form>

        <footer>
            <p>Lucas Braga Santos</p>
        </footer>
    </body>
</html>
