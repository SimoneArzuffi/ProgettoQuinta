<?php
    $valore = 1;
    if(isset($_COOKIE["accesso"])){
        setcookie("accesso", $_COOKIE["accesso"] + 1);
        $accessi = $_COOKIE['accesso'];
    }else{
        setcookie("accesso", $valore);
        $accessi = 0;
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
        
        session_start();
        $post = $_SESSION['POST'];
        echo "Buogiorno " , $post['nome'] , ", login effettuato con successo </br>";
        echo "le tue credenziali sono: </br>";
        echo "nome: ", $post['nome'];
        echo ", cognome: ", $post['cognome'];
        echo ", password: ", $post['password'] , "<br/>";
        echo "accesso numero: " , ($accessi + 1);
    ?>
    <body>
    </body>
</html>