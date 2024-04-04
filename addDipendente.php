<?php
    session_start();
    include "connection.php";
    $post = $_SESSION['POST'];

    //controlla se esiste il gestore che si vuole inserire
    $la_query = "SELECT * FROM dipendente WHERE cf = '" . $post['cf'] . "'";
    if(!$risultati=$connessione->query($la_query)) {
        echo("Errore nell'esecuzione della query: ".$connessione->error.".");
        exit();
    }
    else {
        if($risultati->num_rows == 0)  
        {
            $cf = strtoupper($post['cf']);
            //crea query per inserire il gestore, inizializza ore di permesso, giorni di ferie e giorni di malattia a 0
            $la_query = "INSERT INTO dipendente (nome, cognome, cf, data_nascita, id_azienda) VALUES ('" . $post['nome'] . "' , '" . $post['cognome'] . "', '" . $cf . "', '" . $post['data_di_nascita']. ", '" . $post['azienda'] . "') ";
           if(!$risultati=$connessione->query($la_query)) {
                echo("Errore nell'esecuzione della query: ".$connessione->error.".");
                exit();
            }
            $connessione -> close();
        }
    }
    header("Location: inserisciDipendente.php");
?>