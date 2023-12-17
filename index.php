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
        <form action="logout.php" method="POST">
            <input type="submit" value="logout">
        </form>
        <!-- inserisci la possibilita di inserire un nuovo gestore -->
        <form action="inserisciGestore.php" method="POST">
            <input type="submit" value="inserisci gestore">
        </form>
    </body>
</html>