<?php
    session_start();
    include "connection.php";
?>
<!DOCTYPE html>
<html>
    <head>
        <title>Mostra ferie
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

            table {
                width: 100%;
                border-collapse: collapse;
                margin-top: 20px;
            }

            table {
                width: 100%;
                border-collapse: collapse;
                margin-top: 20px;
            }

            th, td {
                padding: 10px;
                border: 1px solid #ccc;
            }

            th {
                background-color: #4caf50;
                color: #fff;
            }

            tr:nth-child(even) {
                background-color: #f2f2f2;
            }
        </style>
    </head>
    <body>
        <form>
            <input type="submit" value="Mostra ferie">
        </form>
        <a href="home.php">Torna alla home</a>
        <?php
            $query = "SELECT nome, cognome, data_inizio, data_fine, giorni FROM dipendente, ferie WHERE dipendente.id = ferie.id_dipendente";
            $result = mysqli_query($connessione, $query);
            if (mysqli_num_rows($result) > 0) {
                echo "<table>";
                echo "<tr>";
                echo "<th>Id</th>";
                echo "<th>Id dipendente</th>";
                echo "<th>Data inizio</th>";
                echo "<th>Data fine</th>";
                echo "<th>Giorni</th>";
                echo "</tr>";
                while ($row = mysqli_fetch_assoc($result)) {
                    echo "<tr>";
                    echo "<td>" . $row['nome'] . "</td>";
                    echo "<td>" . $row['cognome'] . "</td>";
                    echo "<td>" . $row['data_inizio'] . "</td>";
                    echo "<td>" . $row['data_fine'] . "</td>";
                    echo "<td>" . $row['giorni'] . "</td>";
                    echo "</tr>";
                }
                echo "</table>";
            } else {
                echo "<p>Nessun risultato trovato.</p>";
            }
        ?>
        
    </body>
</html>