<?php
    session_start();
    if(isset($_POST["nome"]) && isset($_POST["cognome"]) && isset($_POST["password"])){
            $_SESSION['POST'] = $_POST;
            header('Location: /www/inserimentoUtente.php');
    }
?>
<!DOCTYPE html>
<html>
    
    <body>
        <form action="registrati.php" method="POST">
                <p>Inserisci il nome </p>
                <input type="text" name="nome"><br>
                <p>Inserisci il cognome </p>
                <input type="text" name="cognome"><br>
                <p>Inserisci la password </p>
                <input type="password" name="password"><br><br>
                <input type="submit">
        </form>
    </body>
</html>