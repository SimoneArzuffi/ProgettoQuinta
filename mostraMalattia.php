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
        <form action="mostraMalattia.php" method="POST">
            <input type="text" name="nome" placeholder="Nome">
            <input type="text" name="cognome" placeholder="Cognome">
            <input type="submit" name="cerca" value="cerca">
            <input type="submit" name="mostraTutti" value="Mostra malattie">
        </form>
        <a href="home.php">Torna alla home</a>
        <?php
        
            if(isset($_POST['mostraTutti'])){
                $query = "SELECT nome, cognome, numero_malattia, data_inizio, data_fine, giorni FROM dipendente, malattia WHERE dipendente.id = malattia.id_dipendente";
                $result = mysqli_query($connessione, $query);
            }elseif(isset($_POST["nome"]) && isset($_POST["cognome"])){
                if($_POST["nome"] != "" && $_POST["cognome"] != ""){
                    $nome = $_POST["nome"];
                    $cognome = $_POST["cognome"];
                    $query = "SELECT nome, cognome, numero_malattia, data_inizio, data_fine, giorni FROM dipendente, malattia WHERE dipendente.id = malattia.id_dipendente AND nome = '$nome' AND cognome = '$cognome'";
                    $result = mysqli_query($connessione, $query);
                }elseif($_POST["nome"] != "" && $_POST["cognome"] == ""){
                    $nome = $_POST["nome"];
                    $query = "SELECT nome, cognome, numero_malattia, data_inizio, data_fine, giorni FROM dipendente, malattia WHERE dipendente.id = malattia.id_dipendente AND nome = '$nome'";
                    $result = mysqli_query($connessione, $query);
                }elseif($_POST["nome"] == "" && $_POST["cognome"] != ""){
                    $cognome = $_POST["cognome"];
                    $query = "SELECT nome, cognome, numero_malattia, data_inizio, data_fine, giorni FROM dipendente, malattia WHERE dipendente.id = malattia.id_dipendente AND cognome = '$cognome'";
                    $result = mysqli_query($connessione, $query);
                }
            }
            
            if(isset($result)){
                if (mysqli_num_rows($result) > 0) {
                    echo "<table border='1'>";
                    echo "<tr>";
                    echo "<th>Nome</th>";
                    echo "<th>Cognome</th>";
                    echo "<th>Numero malattia</th>";
                    echo "<th>Data inizio</th>";
                    echo "<th>Data fine</th>";
                    echo "</tr>";
                    while ($row = mysqli_fetch_assoc($result)) {
                        echo "<tr>";
                        echo "<td>" . $row['nome'] . "</td>";
                        echo "<td>" . $row['cognome'] . "</td>";
                        echo "<td>" . $row['numero_malattia'] . "</td>";
                        $data_inizio = $row['data_inizio'];
                        $data_inizio = explode("-", $data_inizio);
                        $data_inizio = $data_inizio[2] . "/" . $data_inizio[1] . "/" . $data_inizio[0];
                        echo "<td>" . $data_inizio . "</td>";
                        $data_fine = $row['data_fine'];
                        $data_fine = explode("-", $data_fine);
                        $data_fine = $data_fine[2] . "/" . $data_fine[1] . "/" . $data_fine[0];
                        echo "<td>" . $data_fine . "</td>";
                        echo "</tr>";
                    }
                    echo "</table>";
                } else {
                    echo "Nessun risultato";
                }
            }
        ?>
        
    </body>
</html>