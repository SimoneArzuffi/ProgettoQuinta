<?php
    include "connection.php";

    $nome = $_POST['nome'];
    $cognome = $_POST['cognome'];

    // estrai anche nome e cognome dal db
    if ($nome == "" && $cognome == "") {
        $sql = "SELECT ferie.id, dipendente.nome, dipendente.cognome, ferie.data_inizio, ferie.data_fine, ferie.giorni FROM dipendente INNER JOIN ferie ON dipendente.id = ferie.id_dipendente";
    } else if($nome == "" && $cognome != ""){
        "SELECT ferie.id, dipendente.nome, dipendente.cognome, ferie.data_inizio, ferie.data_fine, ferie.giorni FROM dipendente INNER JOIN ferie ON dipendente.id = ferie.id_dipendente WHERE dipendente.cognome = '$cognome'";
    } else if($nome != "" && $cognome == ""){
        "SELECT ferie.id, dipendente.nome, dipendente.cognome, ferie.data_inizio, ferie.data_fine, ferie.giorni FROM dipendente INNER JOIN ferie ON dipendente.id = ferie.id_dipendente WHERE dipendente.nome = '$nome'";
    } else {
        $sql = "SELECT ferie.id, dipendente.nome, dipendente.cognome, ferie.data_inizio, ferie.data_fine, ferie.giorni FROM dipendente INNER JOIN ferie ON dipendente.id = ferie.id_dipendente WHERE dipendente.nome = '$nome' AND dipendente.cognome = '$cognome'";
    }

    $result = $connessione->query($sql);

    $res = $result->fetch_all();

    foreach ($res as $r) {
        echo '<div class="ferie">' .
            $r[1] . " " . $r[2] . " " . $r[3] . " " . $r[4] . " " . $r[5] . ' <button class="delete-btn" data-id="' . $r[0] . '">Delete</button></div>';

    }

?>