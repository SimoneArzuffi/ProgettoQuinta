<?php
    session_start();

    include "connection.php";

    //controlla se esiste l'utente admin
    $la_query = "SELECT * FROM gestore WHERE email = 'admin.progettoquinta@progettoquinta.com'";
    if(!$risultati=$connessione->query($la_query)) {
        echo("Errore nell'esecuzione della query: ".$connessione->error.".");
        exit();
    }//se non esiste l'utente admin lo crea
    else {
        if($risultati->num_rows == 0)  
        {
            $la_query = "INSERT INTO gestore (nome, cognome, email, password) VALUES ('Simone' , 'Arzuffi', 'admin.progettoquinta@progettoquinta.com', '" . password_hash("admin", PASSWORD_DEFAULT) . "')";
            //esegui query per inserire l'utente admin
            if(!$risultati=$connessione->query($la_query)) {
                echo("Errore nell'esecuzione della query: ".$connessione->error.".");
                exit();
            }
            $connessione -> close();
        }
    }

    if(isset($_POST["email"]) && isset($_POST["password"])){
        $_SESSION['POST'] = $_POST;
        header('Location: /www/prelevaGestore.php');
    }
?>
<!DOCTYPE html>
<html>
    <head>
        <title>
            login
        </title>
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