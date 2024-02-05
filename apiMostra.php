<?php
    //crea connessione con il database
    include "connection.php";

    // Ottenere il parametro "k" dalla richiesta POST

    // Creare una query SQL per selezionare tutte le righe dalla tabella 'esempio' che hanno il campo 'nome' che contiene il parametro fornito
    $sql = "SELECT * FROM `dipendente`;";

    // Eseguire la query e ottenere il risultato
    $result = $connessione->query($sql);

    // Ottenere tutte le righe del risultato come un array
    $res = $result->fetch_all();

    // Iterare attraverso ogni riga del risultato e stampare le informazioni desiderate
    foreach ($res as $r) {
        // Stampare una riga di HTML per ogni risultato, con il nome e un pulsante di eliminazione
        echo '<div class="user">' . $r[1] . ' <button class="delete-btn" data-id="' . $r[0] . '">Delete</button></div>';
    }

    // Chiudere la cone$connessione al database
    $connessione->close();
?>
