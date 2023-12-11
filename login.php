<?php
    session_start();
    if(isset($_POST["email"]) && isset($_POST["password"])){
        $_SESSION['POST'] = $_POST;
        header('Location: /www/prelevaUtente.php');
    }
?>
<!DOCTYPE html>
<html>
    <head>
    </head>
    <body>
        <form action="login.php" method="POST">
            <input type="text" name="email"><br>
            <input type="password" name="password"><br>
            <input type="submit">
        </form><br>
        <a href="registrati.php">registrati</a>
    </body>
</html>