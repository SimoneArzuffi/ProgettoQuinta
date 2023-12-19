<?php
    session_start();
    include "connection.php";
    $post = $_SESSION['POST'];
    $la_query = "SELECT id FROM dipendente WHERE nome = '" . $post['nome'] . "' AND cognome = '" . $post['cognome'] . "'";
    if(!$risultati=$connessione->query($la_query)) {
        echo("Errore nell'esecuzione della query: ".$connessione->error.".");
        exit();
    }
    else {
        if($risultati->num_rows == 1)  
        {
            $un_record = $risultati->fetch_array(MYSQLI_ASSOC);
            $id = $un_record['id'];
            $risultati->close();
        }
    }

    $la_query = "INSERT INTO permessi (id_dipendente, data, numero_di_ore) VALUES ('" . $id . "' , '" . $post['data'] . "' , '" . $post['numero_di_ore'] . "')";
    if(!$risultati=$connessione->query($la_query)) {
        echo("Errore nell'esecuzione della query: ".$connessione->error.".");
        exit();
    }else{
        header("Location: inserisciPermessi.php");
    }
?>