<?php

    include "../connection.php";
    
    $userId = $_POST['id'];

    // Creare una query SQL per eliminare l'utente dalla tabella 'esempio' con l'ID specificato
    $sql = "DELETE FROM `dipendente` WHERE id = $userId";

    // Eseguire la query e verificare se l'eliminazione è avvenuta con successo
    if (!$connessione->query($sql)) {
        // Se c'è stato un errore durante l'eliminazione, stampare un messaggio di errore
        echo "Error deleting user: " . $connessione->error;
    }

    // Chiudere la connessione al database
    $connessione->close();

?>