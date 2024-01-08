<!DOCTYPE html>
<html>
    <?php
        session_start();
        include "connection.php"; 
    ?>
    <head>
        <title>mostra dipendenti</title>
        <style>
            body {
                font-family: Arial, sans-serif;
                margin: 0;
                padding: 0;
                background-color: #f4f4f4;
            }

            .container {
                width: 80%;
                margin: 50px auto;
                text-align: center;
            }

            .button-container {
                display: flex;
                flex-wrap: wrap;
                justify-content: center;
                gap: 10px;
                margin-bottom: 20px;
            }

            input[type="submit"] {
                padding: 10px 20px;
                font-size: 16px;
                background-color: #4caf50;
                color: #fff;
                border: none;
                border-radius: 5px;
                cursor: pointer;
            }

            input[type="submit"]:hover {
                background-color: #45a049;
            }
        </style>
    </head>
    <?php
        if (isset($_POST['submit'])) {
            $query = "SELECT * FROM dipendente";
            $result = mysqli_query($connessione, $query);
            echo "<table>";
            echo "<tr>";
            echo "<th>Nome</th>";
            echo "<th>Cognome</th>";
            echo "<th>CF</th>";
            echo "<th>Data di nascita</th>";
            echo "<th>Ore di permesso</th>";
            echo "<th>Giorni di ferie</th>";
            echo "<th>Giorni di malattia</th>";
            echo "</tr>";
            while ($row = mysqli_fetch_array($result)) {
                echo "<tr>";
                echo "<td>" . $row['nome'] . "</td>";
                echo "<td>" . $row['cognome'] . "</td>";
                echo "<td>" . $row['cf'] . "</td>";
                echo "<td>" . $row['data_di_nascita'] . "</td>";
                echo "<td>" . $row['ore_di_permesso'] . "</td>";
                echo "<td>" . $row['giorni_di_ferie'] . "</td>";
                echo "<td>" . $row['giorni_di_malattia'] . "</td>";
                echo "</tr>";
            }
            echo "</table>";
        }
    ?>
    <body>
        <h1> WORK IN PROGRESS </h1>
        <!--
            1. crea pulsante che estrae e mette i dipendenti in una tabella
            2. crea pulsante che estrae solo il dipendente selezionato e lo mette in una tabella
        -->
        <div class="button-container">
            <form action="mostraDipendenti.php" method="POST"><input type="submit" value="Visualizza Dipendenti"></form>
        </div>
    </body>
</html>