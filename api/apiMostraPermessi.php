<?php
    include "../connection.php";

    $nome = $_POST['nome'];
    $cognome = $_POST['cognome'];

    if($nome == "" && $cognome == ""){
        $sql = "SELECT * FROM permesso INNER JOIN dipendente ON permesso.id_dipendente = dipendente.id";
    } else if($nome == "" && $cognome != ""){
        $sql = "SELECT * FROM permesso INNER JOIN dipendente ON permesso.id_dipendente = dipendente.id WHERE cognome = '$cognome'";
    } else if($nome != "" && $cognome == ""){
        $sql = "SELECT * FROM permesso INNER JOIN dipendente ON permesso.id_dipendente = dipendente.id WHERE nome = '$nome'";
    } else {
        $sql = "SELECT * FROM permesso INNER JOIN dipendente ON permesso.id_dipendente = dipendente.id WHERE nome = '$nome' AND cognome = '$cognome'";
    }
    $result = $connessione->query($sql);

    $res = $result->fetch_all();

    echo "Nome Cognome Data Ora Inizio Ora Fine </br>";

    foreach ($res as $r) {
        //stampa nome e cognome giorno e orario di inizio e fine
        echo $r[6] . " ". $r[7] . " " . $r[2] . " " . $r[3] . " " . $r[4] . " ". ' <button class="delete-btn" data-id="' . $r[0] . '">Delete</button></div>' . "<br>";
    }
?>