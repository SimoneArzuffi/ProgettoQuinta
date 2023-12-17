<?php
    session_start();

    include "connection.php";

    $la_query = "SELECT * FROM gestore";
    //controlla se esiste la tabella gestore
    if(!$risultati=$connessione->query($la_query)) {
        echo("Errore nell'esecuzione della query: ".$connessione->error.".");
        exit();
    }
    //se esiste la tabella controlla che esista l'utente admin con email admin.progettoquinta@progettoquinta.com e password admin
    else {
        if($risultati->num_rows >= 1)  
        {
            $un_record = $risultati->fetch_array(MYSQLI_ASSOC);
            if(!password_verify("admin", $un_record['password']) && $un_record['email'] == "admin.progettoquinta@progettoquinta.com"){
                $la_query = "INSERT INTO gestore (email, password) VALUES ('admin.progettoquinta@progettoquinta.com', '" . password_hash("admin", PASSWORD_DEFAULT) . "')";
            }
            $risultati->close();
        }else{
            $la_query = "INSERT INTO gestore (email, password) VALUES ('admin.progettoquinta@progettoquinta.com', '" . password_hash("admin", PASSWORD_DEFAULT) . "')";
            $risultati -> close();
        }
    }
    
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
            <input type="email" name="email" required><br><br>
            <input type="password" name="password" required>
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
    </body>
</html>