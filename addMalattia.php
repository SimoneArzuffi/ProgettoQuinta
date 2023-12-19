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

    $la_query = "INSERT INTO malattia (id_dipendente, numero_malattia, data_inizio, data_fine, giorni) VALUES ('" . $id . "' , '" . $post['numero_malattia'] . "' , '" . $post['data_inizio'] . "', '" . $post['data_fine'] . "', '" . $post['giorni'] . "')";
    if(!$risultati=$connessione->query($la_query)) {
        echo("Errore nell'esecuzione della query: ".$connessione->error.".");
        exit();
    }else{
        header("Location: inserisciMalattia.php");
    }

?>