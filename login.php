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
    <title>Login</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f4f4f4;
        }

        .container {
            width: 80%;
            margin: 0 auto;
            padding-top: 50px;
        }

        .welcome-section {
            text-align: center;
            margin-bottom: 50px;
            resize: none;
        }

        form {
            width: 300px;
            margin: 0 auto;
            background-color: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        input[type="email"],
        input[type="password"],
        input[type="text"],
        input[type="submit"],
        input[type="button"] {
            width: calc(100% - 10px);
            padding: 10px;
            margin-bottom: 15px;
            border: 1px solid #ccc;
            border-radius: 5px;
            font-size: 16px;
            resize: none;
        }
        
        input[type="button"] {
            background-color: #4caf50;
            color: #fff;
            cursor: pointer;
        }

        input[type="button"]:hover {
            background-color: #46a049;
        }

        input[type="submit"] {
            background-color: #007bff;
            color: #fff;
            cursor: pointer;
        }

        input[type="submit"]:hover {
            background-color: #0069d9;
        }

    </style>
</head>
<body>
    <div class="container">
        <div class="welcome-section">
            <h1>Benvenuto!</h1>
            <p>Effettua l'accesso per continuare.</p>
        </div>

        <script src="mostraPsw.js"></script>

        <form action="login.php" method="POST">
            <input type="email" name="email" placeholder="Email" required><br><br>
            <input type="password" name="password" placeholder="Password" required>
            <input type="button" onclick="myFunction()" value="Mostra Password"><br><br>
            <input type="submit" value="Accedi">
        </form><br>

    </div>
</body>
</html>