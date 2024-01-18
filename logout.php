<!DOCTYPE html>
<html>
    <head>
        <title>
            logout
        </title>
    </head>
    <body>
        <?php
            session_start();
            include "connection.php";
            $_SESSION = array();
            session_destroy();
            $connessione->close();
            header('Location: /www/login.php');
        ?>
    </body>
</html>