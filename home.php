<?php
    session_start();
    if(!isset($_SESSION['nome'])){
        header("Location: login.php");
    }
?>
<!DOCTYPE html>
<html>
    <head>
        <title>
            home page
        </title>
    </head>
    <?php
        $post = $_SESSION['POST'];
        echo "Salve, " , $_SESSION['nome'], ", login effettuato con successo </br>";
    ?>
    <body>
        <form action="inserisciGestore.php" method="POST">
            <input type="submit" value="inserisci gestore">
        </form><br><br>
        <form action="inserisciDipendente.php" method="POST">
            <input type="submit" value="inserisci dipendente">
        </form><br><br>
        <form action="rimuoviDipendente.php" method="POST">
            <input type="submit" value="rimuovi dipendente">
        </form><br><br>
        <form action="inserisciFerie.php" method="POST">
            <input type="submit" value="inserisci ferie">
        </form><br><br>
        <form action="inserisciMalattia.php" method="POST">
            <input type="submit" value="inserisci malattia">
        </form><br><br>
        <form action="inserisciPermessi.php" method="POST">
            <input type="submit" value="inserisci permessi">
        </form><br><br>
        <form action="logout.php" method="POST">
            <input type="submit" value="logout">
        </form><br><br>

    </body>
</html>