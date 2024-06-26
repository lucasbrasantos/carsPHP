<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Carros</title>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@24,400,0,0" />
    <link rel="stylesheet" href="../css/style.css">
</head>
    <body>
        <header>
            <h1 id="title">carros</h1>
            <div class="navbar">
                <div id="search-bar">
                    <form method="get" style="display: flex; align-items: center;">
                        <span class="search-icon material-symbols-outlined">search</span>
                        <input type="text" name="query" placeholder="Procurar" value="<?php echo isset($_GET['query']) ? htmlspecialchars($_GET['query']) : ''; ?>">
                        <button type="submit" style="display:none;"></button>
                    </form>
                </div>
                <button onclick="location.href='../pages/addCarro.html';">+ adicionar</button>
                <button class="delete-all-btn" onclick="location.href='../scripts/deleteAll.php';"><span class="delete-all-icon material-symbols-outlined">delete</span> deletar todos</button>
            </div>
        </header>        

        <table>
            <thead>
                <tr>
                    <th>Car ID</th>
                    <th>Marca</th>
                    <th>Cor</th>
                    <th>Ano</th>
                    <th>Preço</th>
                    <th>Usado</th>
                    <th>Adicionais</th>
                    <th style="width: 5%">Apagar</th>
                    <th style="width: 5%">Editar</th>
                </tr>
            </thead>
            <tbody>
                <?php
                    require '../includes/connection.php';

                    $query = isset($_GET['query']) ? $_GET['query'] : '';
                    $sql = "SELECT * FROM cars";
                    if (!empty($query)) {
                        $sql .= " WHERE marca LIKE :query OR cor LIKE :query";
                    }

                    try {
                        $stmt = $pdo->prepare($sql);
                        if (!empty($query)) {
                            $search_query = "%$query%";
                            $stmt->bindParam(':query', $search_query);
                        }
                        $stmt->execute();

                        if ($stmt->rowCount() > 0) {
                            while($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                                // Decode the JSON additional features
                                $adicionais = json_decode($row['adicionais'], true);
                                $adicionaisFormatted = implode(', ', $adicionais);

                                echo "
                                <tr>
                                    <td>{$row['id']}</td>
                                    <td>{$row['marca']}</td>
                                    <td>{$row['cor']}</td>
                                    <td>{$row['ano']}</td>
                                    <td>\${$row['preco']}</td>
                                    <td>{$row['usado']}</td>
                                    <td>{$adicionaisFormatted}</td>
                                    <td>
                                        <a href=\"../scripts/delete.php?id={$row['id']}\">
                                            <span class=\"delete-icon material-symbols-outlined\">delete</span>
                                        </a>
                                    </td>
                                    <td>
                                        <a href=\"../pages/editCarro.php?id={$row['id']}\">
                                            <span class=\"edit-icon material-symbols-outlined\">edit</span>
                                        </a>
                                    </td>
                                </tr>
                                ";
                            }
                        } else {
                            // If there are no cars, display a single row with a colspan of 9 containing the message
                            echo "
                            <tr>
                                <td colspan=\"9\">
                                    <h1>Nenhum resultado</h1>
                                </td>
                            </tr>
                            ";
                        }

                    } catch(PDOException $e) {
                        echo "Error: " . $e->getMessage();
                    }
                ?>
            </tbody>
        </table>

        <footer>
            <p>Lucas Braga Santos</p>
        </footer>
    </body>
</html>
