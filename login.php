<?php
    session_start();
    if(isset($_POST["nome"]) && isset($_POST["cognome"]) && isset($_POST["password"])){
            $_SESSION['POST'] = $_POST;
            header('Location: /progettoQuinta/prelevaUtente.php');
    }
?>
<!DOCTYPE html>
<html>
    <head>
    </head>
    <body>
        <form action="login.php" method="POST">
            <input type="text" name="nome"><br>
            <input type="text" name="cognome"><br>
            <input type="password" name="password"><br>
            <input type="submit">
        </form><br>
        <a href="registrati.php">registrati</a>
    </body>
</html>