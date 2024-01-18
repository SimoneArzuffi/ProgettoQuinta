<?php
    session_start();
    include "connection.php";
?>
<!DOCTYPE html>
<html>
    <head>
        <title>Mostra ferie
        </title>
        <link rel="stylesheet" href="file_css/mostra.css">
    </head>
    <body>
        <form action="mostraFerie.php" method="post">
            <input type="text" name="nome" placeholder="nome">
            <input type="text" name="cognome" placeholder="cognome">
            <input type="submit" value="cerca">
            <input type="submit" name="mostraTutti" value="Mostra ferie">
        </form>
        <a href="home.php">Torna alla home</a>
        <?php
            if (isset($_POST['mostraTutti'])) {
                $query = "SELECT nome, cognome, data_inizio, data_fine, giorni FROM dipendente, ferie WHERE dipendente.id = ferie.id_dipendente";
                $result = mysqli_query($connessione, $query);
            }elseif(isset($_POST["nome"]) && isset($_POST["cognome"])){
                if($_POST["nome"] != "" && $_POST["cognome"] != ""){
                    $query = "SELECT nome, cognome, data_inizio, data_fine, giorni FROM dipendente, ferie WHERE dipendente.id = ferie.id_dipendente AND nome = '".$_POST["nome"]."' AND cognome = '".$_POST["cognome"]."'";
                    $result = mysqli_query($connessione, $query);
                }elseif($_POST["nome"] != "" && $_POST["cognome"] == ""){
                    $query = "SELECT nome, cognome, data_inizio, data_fine, giorni FROM dipendente, ferie WHERE dipendente.id = ferie.id_dipendente AND nome = '".$_POST["nome"]."'";
                    $result = mysqli_query($connessione, $query);
                }elseif($_POST["nome"] == "" && $_POST["cognome"] != ""){
                    $query = "SELECT nome, cognome, data_inizio, data_fine, giorni FROM dipendente, ferie WHERE dipendente.id = ferie.id_dipendente AND cognome = '".$_POST["cognome"]."'";
                    $result = mysqli_query($connessione, $query);
                }
            }
            if(isset($result)){
                if (mysqli_num_rows($result) > 0) {
                    echo "<table>";
                    echo "<tr>";
                    echo "<th>Nome</th>";
                    echo "<th>Cognome</th>";
                    echo "<th>Data inizio</th>";
                    echo "<th>Data fine</th>";
                    echo "<th>Giorni</th>";
                    echo "</tr>";
                    while ($row = mysqli_fetch_assoc($result)) {
                        echo "<tr>";
                        echo "<td>" . $row['nome'] . "</td>";
                        echo "<td>" . $row['cognome'] . "</td>";
                        //cambia formato data da yyyy-mm-dd a dd/mm/yyyy
                        $data_inizio = date("d/m/Y", strtotime($row['data_inizio']));
                        echo "<td>" . $data_inizio . "</td>";
                        $data_fine = date("d/m/Y", strtotime($row['data_fine']));
                        echo "<td>" . $data_fine . "</td>";
                        echo "<td>" . $row['giorni'] . "</td>";
                        echo "</tr>";
                    }
                    echo "</table>";
                } else {
                    echo "<p>Nessun risultato trovato.</p>";
                }
            }
        ?>
        
    </body>
</html>