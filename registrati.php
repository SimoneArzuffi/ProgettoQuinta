<?php
    session_start();
    if(isset($_POST["email"]) && isset($_POST["password"])){
            $_SESSION['POST'] = $_POST;
            header('Location: /www/inserimentoUtente.php');
    }
?>
<!DOCTYPE html>
<html>
    
    <body>
        <form action="registrati.php" method="POST">
                <p>Inserisci l'email </p>
                <input type="email" name="email"><br>
                <p>Inserisci la password </p>
                <input type="password" name="password"><br><br>
                <input type="submit">
        </form>
    </body>
</html>