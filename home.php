<?php
    session_start();
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
        <!-- inserisci la possibilita di inserire un nuovo gestore -->
        <form action="inserisciGestore.php" method="POST">
            <input type="submit" value="inserisci gestore">
        </form><br><br>
        <!-- inserisci la possibilita di inserire un nuovo dipendente -->
        <form action="inserisciDipendente.php" method="POST">
            <input type="submit" value="inserisci dipendente">
        </form><br><br>
        <form action="inserisciFerie.php" method="POST">
            <input type="submit" value="inserisci ferie">
        </form>
        <form action="logout.php" method="POST">
            <input type="submit" value="logout">
        </form><br><br>
    </body>
</html>