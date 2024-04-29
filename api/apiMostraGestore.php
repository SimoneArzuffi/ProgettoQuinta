<?php
    session_start();
    include "../connection.php";

    $sql = "SELECT * FROM gestore";

    // Eseguire la query e ottenere il risultato
    $result = $connessione->query($sql);

    // Ottenere tutte le righe del risultato come un array
    $res = $result->fetch_all();

    // Iterare attraverso ogni riga del risultato e stampare le informazioni desiderate
    echo '<div class="user">Nome Cognome</div>';
    foreach ($res as $r) {
        // Stampare una riga di HTML per ogni risultato, con il nome e cognome e un pulsante di eliminazione usa div 
        echo '<div class="user">' . $r[1] . " " . $r[2] . ' <button class="delete-btn" data-id="' . $r[0] . '">Delete</button></div>';
    }

    // Chiudere la cone$connessione al database
    $connessione->close();
?>