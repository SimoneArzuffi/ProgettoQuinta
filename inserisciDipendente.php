<!DOCTYPE html>
<html>
<?php
        session_start();
        if(isset($_POST["nome"]) && isset($_POST["cognome"]) && isset($_POST["data_di_nascita"]) && isset($_POST["ore_di_permesso"]) && isset($_POST["giorni_di_ferie"]) && isset($_POST["giorni_di_malattia"])){
            $_SESSION['POST'] = $_POST;
            header('Location: /www/addDipendente.php');
        }
    ?>
    <head>
        <title>
            inserisci dipendente
        </title>
    </head>


    <body>
        <!-- inserisci la possibilita di inserire un nuovo dipendente -->
        <form action="inserisciDipendente.php" method="POST">
            <input type="text" name="nome" placeholder="nome" required><br><br>
            <input type="text" name="cognome" placeholder="cognome" required><br><br>
            <input type="text" name="cf" placeholder="codice fiscale" style="text-transform: uppercase;" required><br><br>
            <input type="date" name="data_di_nascita" placeholder="data di nascita" required><br><br>
            <input type="number" min="0" name="ore_di_permesso" placeholder="ore di permesso" required><br><br>
            <input type="number" min="0" name="giorni_di_ferie" placeholder="giorni di ferie" required><br><br>
            <input type="number" min="0" name="giorni_di_malattia" placeholder="giori di malattia" required><br><br>
            <input type="submit" value="inserisci dipendente">
        </form><br><br>
        <a href="index.php">torna alla home</a>

    </body>
</html>