<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Document</title>
        
        <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@24,400,0,0" />

        <link rel="stylesheet" href="../css/style.css">
    </head>
    <body>
        
        

        <header>
            <h1 id="title">carros</h1>
            <div class="navbar">
                <div id="search-bar">
                    <span class="search-icon material-symbols-outlined">
                        search
                    </span>
                    <input type="text" placeholder="Procurar">
                </div>
                <button onclick="location.href='../pages/addCarro.html';">+ adicionar</button>
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
                    <th style="width: 5%">Editar</th>
                    <th style="width: 5%">Apagar</th>
                </tr>
            </thead>
            <tbody>
                <?php

                    require '../includes/connection.php';

                    try {
                        $sql = "SELECT * FROM cars";
                        $stmt = $pdo->query($sql);
                        
                        if ($stmt->rowCount() > 0) {
                            while($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                                echo "
                                <tr>
                                    <td>{$row['id']}</td>
                                    <td>{$row['marca']}</td>
                                    <td>{$row['cor']}</td>
                                    <td>{$row['ano']}</td>
                                    <td>\${$row['preco']}</td>
                                    <td>
                                        <a href=\"../scripts/delete.php?id={$row['id']}\">
                                            <span class=\"delete-icon material-symbols-outlined\">
                                                delete
                                            </span>
                                        </a>
                                    </td>
                                    <td>
                                        <a href=\"../pages/editCarro.php?id={$row['id']}\">    
                                            <span class=\"edit-icon material-symbols-outlined\">
                                                edit
                                            </span>
                                        </a>
                                    </td>
                                </tr>
                                ";
                            }
                        } else {
                            // If there are no cars, display a single row with a colspan of 6 containing the message
                            echo "
                            <tr>
                                <td colspan=\"6\">
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
