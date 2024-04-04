<?php
    session_start();
    include "connection.php";
    $sql = "SELECT nome FROM azienda";
    
    $result = $connessione->query($sql);

    $res = $result->fetch_all();

    foreach($res as $r){
        if($r == $_POST['nome']){
            header("Location: inserisciAzienda.php");
        }
    }

    $sql = "INSERT INTO azienda (nome) VALUES ('" . $_POST['nome'] . "');";

    if(!$risultati=$connessione->query($la_query)) {
        echo("Errore nell'esecuzione della query: ".$connessione->error.".");
        exit();
    }

    $connessione -> close();

    header("Location: inserisciAzienda.php");

?>