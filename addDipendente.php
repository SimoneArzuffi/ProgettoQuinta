<?php
    session_start();
    include "connection.php";
    $post = $_SESSION['POST'];

    //controlla se esiste il gestore che si vuole inserire
    $la_query = "SELECT * FROM gestore WHERE cf = '" . $post['cf'] . "'";
    if(!$risultati=$connessione->query($la_query)) {
        echo("Errore nell'esecuzione della query: ".$connessione->error.".");
        exit();
    }
    else {
        if($risultati->num_rows == 0)  
        {
            //esegui query per inserire il gestore
            $la_query = "INSERT INTO gestore (nome, cognome, cf, data_di_nascita, ore_di_permesso, giorni_di_ferie, giori_di_malattia) VALUES ('" . $post['nome'] . "' , '" . $post['cognome'] . "', '" . $post['cf'] . "', '" . $post['data_di_nascita'] . "', '" . $post['ore_di_permesso'] . "', '" . $post['giorni_di_ferie'] . "', '" . $post['giorni_di_malattia'] . "') ";
            if(!$risultati=$connessione->query($la_query)) {
                echo("Errore nell'esecuzione della query: ".$connessione->error.".");
                exit();
            }
            $connessione -> close();
        }
    }
?>