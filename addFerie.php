<?php
    include "connection.php";
    session_start();

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
    $la_query = "INSERT INTO ferie (id_dipendente, data_inizio, data_fine, giorni) VALUES ('" . $id . "' , '" . $post['data_inizio'] . "', '" . $post['data_fine'] . "', '" . $post['giorni'] . "')";
    if(!$risultati=$connessione->query($la_query)) {
        echo("Errore nell'esecuzione della query: ".$connessione->error.".");
        exit();
    }else{
        header("Location: inserisciFerie.php");
    }
?>