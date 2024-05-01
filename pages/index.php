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
        
        <div class="container">

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

                        $sql = "select * from cars";
                        $result = $con->query($sql);

                        if ($result->num_rows > 0) {
                        
                        
                            while($row = $result->fetch_assoc()) {
                                echo "
                                <tr>
                                    <td>$row[id]</td>
                                    <td>$row[marca]</td>
                                    <td>$row[cor]</td>
                                    <td>$row[ano]</td>
                                    <td>\$$row[preco]</td>
                                    <td>
                                        <a href=\"../scripts/delete.php?id=$row[id]\">
                                            <span class=\"delete-icon material-symbols-outlined\">
                                                delete
                                            </span>
                                        </a>
                                    </td>
                                    <td>
                                        <a href=\"../pages/editCarro.php?id=$row[id]\">    
                                            <span class=\"edit-icon material-symbols-outlined\">
                                                edit
                                            </span>
                                        </a>
                                    </td>
                                </tr>
                                
                                ";
                            }

                        } else {
                        echo "
                            <tr>
                                <td colspan=\"6\">
                                    <h1 >Nenhum resultado</h1>
                                <td>
                            </tr>
                        
                        ";
                        }

                    ?>
                </tbody>
            </table>

            <footer>
                <p>Lucas Braga Santos</p>
            </footer>
        </div>

    </body>
</html>