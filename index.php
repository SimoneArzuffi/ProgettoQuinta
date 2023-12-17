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
        echo "Salve, " , $post['email'] , ", login effettuato con successo </br>";
        
    ?>
    <body>
        <form action="logout.php" method="POST">
            <input type="submit" value="logout">
        </form>
    </body>
</html>