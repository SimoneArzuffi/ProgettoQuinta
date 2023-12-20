<?php
    session_start();
    include "connection.php";
    $post = $_SESSION['POST'];
    $cf = strtoupper($post['cf']);
    $la_query = "DELETE FROM dipendente WHERE cf = '" . $cf . "'";
    if(!$risultati=$connessione->query($la_query)) {
        echo("Errore nell'esecuzione della query: ".$connessione->error.".");
        exit();
    }
    $connessione -> close();
    header("Location: rimuoviDipendente.php");
?>