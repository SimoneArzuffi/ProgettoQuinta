<?php
    session_start();
    include "connection.php";
?>
<!DOCTYPE html>
<html>
    <head>
        <title>Permessi</title>
        <link rel="stylesheet" href="file_css/mostra.css">
    </head>
    <body>
        <form action="mostraPermessi.php" method="post">
            <input type="text" name="nome" placeholder="Nome">
            <input type="text" name="cognome" placeholder="Cognome">
            <input type="submit" name="cerca" value="cerca">
            <input type="submit" name="mostraTutti" value="Mostra permessi">
        </form>
        <?php
            if (isset($_POST["mostraTutti"])) {
                $query = "SELECT nome, cognome, ora_inizio, ora_fine FROM dipendente, permesso WHERE dipendente.id = permesso.id_dipendente";
                $result = mysqli_query($connessione, $query);
                if (mysqli_num_rows($result) > 0) {
                    echo "<table>";
                    echo "<tr>";
                    echo "<th>Nome</th>";
                    echo "<th>Cognome</th>";
                    echo "<th>Ora di inizio</th>";
                    echo "<th>Ora di fine</th>";
                    echo "</tr>";
                    while ($row = mysqli_fetch_assoc($result)) {
                        echo "<tr>";
                        echo "<td>" . $row["nome"] . "</td>";
                        echo "<td>" . $row["cognome"] . "</td>";
                        echo "<td>" . $row["ora_inizio"] . "</td>";
                        echo "<td>" . $row["ora_fine"] . "</td>";
                        echo "</tr>";
                    }
                    echo "</table>";
                } else {
                    echo "Nessun permesso trovato";
                }
            }elseif (isset($_POST["cerca"])) {
                if($_POST["nome"] != "" && $_POST["cognome"] != ""){
                    $query = "SELECT nome, cognome, ora_inizio, ora_fine FROM dipendente, permesso WHERE dipendente.id = permesso.id_dipendente AND nome = '" . $_POST["nome"] . "' AND cognome = '" . $_POST["cognome"] . "'";
                    $result = mysqli_query($connessione, $query);
                    if (mysqli_num_rows($result) > 0) {
                        echo "<table>";
                        echo "<tr>";
                        echo "<th>Nome</th>";
                        echo "<th>Cognome</th>";
                        echo "<th>Ora di inizio</th>";
                        echo "<th>Ora di fine</th>";
                        echo "</tr>";
                        while ($row = mysqli_fetch_assoc($result)) {
                            echo "<tr>";
                            echo "<td>" . $row["nome"] . "</td>";
                            echo "<td>" . $row["cognome"] . "</td>";
                            echo "<td>" . $row["ora_inizio"] . "</td>";
                            echo "<td>" . $row["ora_fine"] . "</td>";
                            echo "</tr>";
                        }
                        echo "</table>";
                    } else {
                        echo "Nessun permesso trovato";
                    }
                }elseif($_POST["nome"] != "" && $_POST["cognome"] == ""){
                    $query = "SELECT nome, cognome, ora_inizio, ora_fine FROM dipendente, permesso WHERE dipendente.id = permesso.id_dipendente AND nome = '" . $_POST["nome"] . "'";
                    $result = mysqli_query($connessione, $query);
                    if (mysqli_num_rows($result) > 0) {
                        echo "<table>";
                        echo "<tr>";
                        echo "<th>Nome</th>";
                        echo "<th>Cognome</th>";
                        echo "<th>Ora di inizio</th>";
                        echo "<th>Ora di fine</th>";
                        echo "</tr>";
                        while ($row = mysqli_fetch_assoc($result)) {
                            echo "<tr>";
                            echo "<td>" . $row["nome"] . "</td>";
                            echo "<td>" . $row["cognome"] . "</td>";
                            echo "<td>" . $row["ora_inizio"] . "</td>";
                            echo "<td>" . $row["ora_fine"] . "</td>";
                            echo "</tr>";
                        }
                        echo "</table>";
                    } else {
                        echo "Nessun permesso trovato";
                    }
                }elseif($_POST["nome"] == "" && $_POST["cognome"] != ""){
                    $query = "SELECT nome, cognome, ora_inizio, ora_fine FROM dipendente, permesso WHERE dipendente.id = permesso.id_dipendente AND cognome = '" . $_POST["cognome"] . "'";
                    $result = mysqli_query($connessione, $query);
                    if (mysqli_num_rows($result) > 0) {
                        echo "<table>";
                        echo "<tr>";
                        echo "<th>Nome</th>";
                        echo "<th>Cognome</th>";
                        echo "<th>Ora di inizio</th>";
                        echo "<th>Ora di fine</th>";
                        echo "</tr>";
                        while ($row = mysqli_fetch_assoc($result)) {
                            echo "<tr>";
                            echo "<td>" . $row["nome"] . "</td>";
                            echo "<td>" . $row["cognome"] . "</td>";
                            echo "<td>" . $row["ora_inizio"] . "</td>";
                            echo "<td>" . $row["ora_fine"] . "</td>";
                            echo "</tr>";
                        }
                        echo "</table>";
                    } else {
                        echo "Nessun permesso trovato";
                    }
                }else{
                    echo "Inserisci almeno un campo";
                }
            }
        ?>
    </body>
</html>