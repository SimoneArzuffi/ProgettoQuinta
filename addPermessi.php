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

    //crea query per aggiungere tutti i dati deipermessi
    $la_query = "INSERT INTO permesso (id_dipendente, data, ora_inizio, ora_fine) VALUES ('" . $id . "', '" . $post['data'] . "', '" . $post['ora_di_inizio'] . "', '" . $post['ora_di_fine'] . "')";
    
    if(!$risultati=$connessione->query($la_query)) {
        echo("Errore nell'esecuzione della query: ".$connessione->error.".");
        exit();
    }else{
        header("Location: inserisciPermessi.php");
    }
?>