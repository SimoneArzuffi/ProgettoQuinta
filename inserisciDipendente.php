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
            <p>inserisci il nome del dipendente</p>
            <input type="text" name="nome" placeholder="nome" required><br><br>
            <p>inserisci il cognome del dipendente</p>
            <input type="text" name="cognome" placeholder="cognome" required><br><br>
            <p>inserisci il codice fiscale del dipendente</p>
            <input type="text" name="cf" placeholder="codice fiscale" style="text-transform: uppercase;" required><br><br>
            <p>inserisci la data di nascita del dipendente</p>
            <input type="date" name="data_di_nascita" placeholder="data di nascita" required><br><br>
            <input type="submit" value="inserisci dipendente">
        </form><br><br>
        <a href="home.php">torna alla home</a>

    </body>
</html>