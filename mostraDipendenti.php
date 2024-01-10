<?php
    session_start();
    include "connection.php";
?>
<!DOCTYPE html>
<html>
    <head>
        <title>Mostra dipendenti
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

            a:hover {
                text-decoration: underline;
            }

            /* Aggiunta di stili per la tabella */
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
        <!--aggiungi la possibilità di selezionare il dipendente desiderato tramite nome e cognome-->
        <form action="mostraDipendenti.php" method="post">
            <label for="nome">Nome</label>
            <input type="text" name="nome" id="nome">
            <label for="cognome">Cognome</label>
            <input type="text" name="cognome" id="cognome">
            <input type="submit" value="Cerca">
            <!--aggiungi la possibilità di far vedere tutti i dipendenti-->
            <input type="submit" name="mostraTutti" value="Mostra tutti i dipendenti">
        </form>
        <?php
            if(isset($_POST["mostraTutti"])){
                $query = "SELECT * FROM dipendente";
            } else if(isset($_POST["nome"]) && isset($_POST["cognome"])){
                $nome = $_POST["nome"];
                $cognome = $_POST["cognome"];
                $query = "SELECT * FROM dipendente WHERE nome = '$nome' AND cognome = '$cognome'";
            } else if(isset($_POST["nome"]) && is_null($_POST["cognome"])){
                $nome = $_POST["nome"];
                $query = "SELECT * FROM dipendente WHERE nome = '$nome'";
            } else if(isset($_POST["cognome"]) && is_null($_POST["nome"])){
                $cognome = $_POST["cognome"];
                $query = "SELECT * FROM dipendente WHERE cognome = '$cognome'";
            } else {
                $query = "SELECT * FROM dipendente";
            }
            $result = mysqli_query($connessione, $query);
            if (mysqli_num_rows($result) > 0) {
                echo "<table border='1'>";
                echo "<tr>";
                echo "<th>Nome</th>";
                echo "<th>Cognome</th>";
                echo "<th>codice fiscale</th>";
                echo "<th>data di nascita</th>";
                echo "</tr>";
                while ($row = mysqli_fetch_assoc($result)) {
                    echo "<tr>";
                    echo "<td>" . $row["nome"] . "</td>";
                    echo "<td>" . $row["cognome"] . "</td>";
                    echo "<td>" . $row["cf"] . "</td>";
                    echo "<td>" . $row["data_di_nascita"] . "</td>";
                    echo "</tr>";
                }
                echo "</table>";
            } else {
                echo "0 results";
            }
        ?>
        <a href="home.php">Torna alla home</a>
    </body>
</html>