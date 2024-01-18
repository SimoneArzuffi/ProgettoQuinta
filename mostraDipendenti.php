<?php
    session_start();
    include "connection.php";
?>
<!DOCTYPE html>
<html>
    <head>
        <title>Mostra dipendenti
        </title>
        <link rel="stylesheet" href="file_css/mostra.css">
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
        <a href="home.php">Torna alla home</a>
        <?php
            if(isset($_POST["mostraTutti"])){
                $query1 = "SELECT * FROM dipendente";
                $result = mysqli_query($connessione, $query1);
            }elseif(isset($_POST["nome"]) && isset($_POST["cognome"])){
                if($_POST["nome"] != "" && $_POST["cognome"] != ""){
                    $nome = $_POST["nome"];
                    $cognome = $_POST["cognome"];
                    $query2 = "SELECT * FROM dipendente WHERE nome = '$nome' AND cognome = '$cognome'";
                    $result = mysqli_query($connessione, $query2);
                    echo $query2 , "<br>";
                } elseif($_POST["nome"] != "" && $_POST["cognome"] == ""){
                    $nome = $_POST["nome"];
                    $query3 = "SELECT * FROM dipendente WHERE nome = '$nome'";
                    $result = mysqli_query($connessione, $query3);
                    echo $query3 , "<br>";
                } elseif($_POST["nome"] == "" && $_POST["cognome"] != ""){
                    $cognome = $_POST["cognome"];
                    $query4 = "SELECT * FROM dipendente WHERE cognome = '$cognome'";
                    $result = mysqli_query($connessione, $query4);
                } else {
                    $query1 = "SELECT * FROM dipendente";
                    $result = mysqli_query($connessione, $query1);
                }
            }
            //controllo che la variabile $result non sia nulla
            if(isset($result)){
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
                        //stampa date in formato italiano
                        $data = $row["data_di_nascita"];
                        $data = explode("-", $data);
                        $data = $data[2] . "/" . $data[1] . "/" . $data[0];
                        echo "<td>" . $data . "</td>";
                        echo "</tr>";
                    }
                    echo "</table>";
                } else {
                    echo "0 results";
                }
            }
        ?>
    </body>
</html>