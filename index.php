<?php
    session_start();
    if(isset($_COOKIE["accesso"])){
        setcookie("accesso", $_COOKIE["accesso"] + 1);
        $accessi = $_COOKIE['accesso'];
    }else{
        $accessi = 0;
        setcookie("accesso", $accessi);
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
        echo "Buogiorno " , $post['email'] , ", login effettuato con successo </br>";
        echo "accesso numero: " , ($accessi + 1);
    ?>
    <body>
    </body>
</html>