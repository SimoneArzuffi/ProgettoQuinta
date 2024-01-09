<?php
    session_start();
    include "connection.php";
?>
<!DOCTYPE html>
<html>
    <head>
        <title>Mostra dipendenti</title>
    </head>
    <body>
        <!--aggiungi la possibilità di selezionare il dipendente desiderato tramite nome e cognome-->
        <form action="mostraDipendenti.php" method="post">
            <label for="nome">Nome</label>
            <input type="text" name="nome" id="nome">
            <label for="cognome">Cognome</label>
            <input type="text" name="cognome" id="cognome">
            <input type="submit" value="Cerca">
        </form>
        <?php
            if(isset($_POST["nome"]) && isset($_POST["cognome"])){
                $nome = $_POST["nome"];
                $cognome = $_POST["cognome"];
                $query = "SELECT * FROM dipendente WHERE nome = '$nome' AND cognome = '$cognome'";
            }else{
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