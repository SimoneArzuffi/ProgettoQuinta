<?php
    session_start();
    include "connection.php";
?>
<!DOCTYPE html>
<html>
    <head>
        <title>Mostra malattia
        </title>
        <style>
            body {
                font-family: Arial, sans-serif;
                margin: 0;
                padding: 20px;
                background-color: #f4f4f4;
            }

            form {
                width: 300px;
                margin: 0 auto;
                padding: 20px;
                background-color: #fff;
                border-radius: 8px;
                box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            }

            p {
                margin-top: 10px;
                margin-bottom: 5px;
            }

            input[type="text"],
            input[type="date"],
            input[type="submit"] {
                width: calc(100% - 10px);
                padding: 10px;
                margin-bottom: 15px;
                border: 1px solid #ccc;
                border-radius: 5px;
                font-size: 16px;
            }

            input[type="submit"] {
                background-color: #4caf50;
                color: #fff;
                cursor: pointer;
            }

            input[type="submit"]:hover {
                background-color: #218838;
            }

            a {
                display: block;
                margin-top: 10px;
                text-align: center;
                text-decoration: none;
                color: #007bff;
            }
        </style>
    </head>
    <body>
        <form action="mostraMalattia.php" method="POST">
            <h1>Mostra malattia</h1>
            <p>Nome dipendente</p>
            <select name="nomeDipendente">
                <?php
                    $query = "SELECT nome FROM dipendenti";
                    $result = mysqli_query($conn, $query);
                    while ($row = mysqli_fetch_array($result)) {
                        echo "<option value='" . $row['nome'] . "'>" . $row['nome'] . "</option>";
                    }
                ?>
            </select>
            <input type="submit" value="Mostra">
        </form>
        <a href="home.php">Torna alla home</a>
    </body>