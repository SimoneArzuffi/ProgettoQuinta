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
            <input type="email" name="email"><br><br>
            <input type="password" name="password" >
            <!-- inserisci la possibilità di vedere la password -->
            <input type="button" onclick="myFunction()" value="mostra password"><br><br>
            <script>
                function myFunction() {
                    var x = document.getElementsByName("password")[0];
                    if (x.type === "password") {
                        x.type = "text";
                    } else {
                        x.type = "password";
                    }
                }
            </script>
            <input type="submit">
        </form><br>
        <a href="registrati.php">registrati</a>
    </body>
</html>