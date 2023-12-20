<!DOCTYPE html>
<html>
    <?php
        session_start();
        if(isset($_POST['cf'])){
            $_SESSION['POST'] = $_POST;
            header('Location: /www/removeDipendente.php');
        }
    ?>
    <head>
        <title>
            rimuovi dipendente
        </title>
    </head>
    <body>
        <form action="rimuoviDipendente.php" method="POST">
            <p>inserisci il codice fiscale del dipendente</p>
            <input type="text" name="cf" placeholder="codice fiscale" style="text-transform: uppercase;" required><br><br>
            <input type="submit" value="rimuovi dipendente">
        </form><br><br>
        <a href="home.php">torna alla home</a>
    </body>
</html>