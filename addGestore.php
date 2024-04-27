<?php
    include "connection.php";
    session_start();

    $post = $_SESSION['POST'];

    //controlla se esiste il gestore che si vuole inserire
    $la_query = "SELECT * FROM gestore WHERE email = '" . $post['email'] . "'";
    if(!$risultati=$connessione->query($la_query)) {
        echo("Errore nell'esecuzione della query: ".$connessione->error.".");
        exit();
    }
    else {
        if($risultati->num_rows == 0)  
        {
            //esegui query per inserire il gestore
            $la_query = "INSERT INTO gestore (nome, cognome, email, password, ruolo) VALUES ('" . $post['nome'] . "' , '" . $post['cognome'] . "', '" . $post['email'] . "', '" . password_hash($post['password'], PASSWORD_DEFAULT). ", ". $post['azienda'] . "')";
            if(!$risultati=$connessione->query($la_query)) {
                echo("Errore nell'esecuzione della query: ".$connessione->error.".");
                exit();
            }
            $connessione -> close();
        }
    }
    header("Location: inserisciGestore.php");
?>
<body>

</body>