<?php
    //crea connessione con il database
    include "www/connection.php";

    // Ottenere i parametri nome e cognome dalla richiesta POST
    $nome = $_POST['nome'];
    $cognome = $_POST['cognome'];

    // Controllare se i parametri sono vuoti
    if ($nome == "" && $cognome == "") {
        // Se sono vuoti, eseguire una query per ottenere tutti i dipendenti
        $sql = "SELECT * FROM dipendente";
    } else if($nome == "" && $cognome != ""){
        // Se il nome è vuoto e il cognome è pieno, eseguire una query per ottenere i dipendenti con quel cognome
        $sql = "SELECT * FROM dipendente WHERE cognome = '$cognome'";
    } else if($nome != "" && $cognome == ""){
        // Se il nome è pieno e il cognome è vuoto, eseguire una query per ottenere i dipendenti con quel nome
        $sql = "SELECT * FROM dipendente WHERE nome = '$nome'";
    } else {
        // Se entrambi i parametri sono pieni, eseguire una query per ottenere i dipendenti con quel nome e cognome
        $sql = "SELECT * FROM dipendente WHERE nome = '$nome' AND cognome = '$cognome'";
    }

    // Eseguire la query e ottenere il risultato
    $result = $connessione->query($sql);

    // Ottenere tutte le righe del risultato come un array
    $res = $result->fetch_all();

    // Iterare attraverso ogni riga del risultato e stampare le informazioni desiderate
    foreach ($res as $r) {
        // Stampare una riga di HTML per ogni risultato, con il nome e cognome e un pulsante di eliminazione usa div 
        echo '<div class="user">' . $r[1] . " " . $r[2] . ' <button class="delete-btn" data-id="' . $r[0] . '">Delete</button></div>';
    }

    // Chiudere la cone$connessione al database
    $connessione->close();
?>
