<?php
    session_start();
    include "connection.php";
?>
<!DOCTYPE html>
<html>
    <head>
        <title>Permessi</title>
        <link rel="stylesheet" href="mostra.css">
    </head>
    <body>
        <form action="mostraPermessi.php" method="post">
            <input type="submit" name="mostraTutti" value="Mostra permessi">
        </form>
        <?php
            if (isset($_POST["mostraTutti"])) {
                $query = "SELECT * FROM permessi";
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
            }
        ?>
    </body>
</html>