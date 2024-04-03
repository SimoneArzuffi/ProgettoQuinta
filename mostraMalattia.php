<?php
    session_start();
    include "connection.php";
?>
<!DOCTYPE html>
<html>
    <head>
        <title>Mostra malattia
        </title>
        <link rel="stylesheet" href="file_css/mostra.css">
    </head>
    <body>
        <form action="mostraMalattia.php" method="POST">
            <input type="text" name="nome" placeholder="Nome">
            <input type="text" name="cognome" placeholder="Cognome">
            <input type="submit" name="cerca" value="cerca">
            <input type="submit" name="mostraTutti" value="Mostra malattie">
        </form>
        <a href="index.php">Torna alla home</a>
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