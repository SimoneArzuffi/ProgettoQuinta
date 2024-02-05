<?php
    include "connection.php";

    // Ottenere il parametro "id" dalla richiesta POST
    $id = $_POST['id'];
    // Creare una query SQL per eliminare la riga dalla tabella 'esempio' con l'ID fornito
    $sql = "DELETE FROM `dipendente` WHERE `id` = $id;";
    // Eseguire la query e ottenere il risultato
    $result = $connessione->query($sql);
    // Chiudere la connessione al database
    $connessione->close();

?>