<?php
    session_start();
    include "../connection.php";

    $nome = $_POST['nome'];
    $cognome = $_POST['cognome'];

    if($nome == "" && $cognome == ""){
        $sql = "SELECT * FROM permesso INNER JOIN dipendente ON permesso.id_dipendente = dipendente.id";
        if($_SESSION['ruolo'] != 0){
            $sql = $sql . " WHERE dipendente.id_azienda = " . $_SESSION['ruolo'] . ";";
        }
    } else if($nome == "" && $cognome != ""){
        $sql = "SELECT * FROM permesso INNER JOIN dipendente ON permesso.id_dipendente = dipendente.id WHERE cognome = '$cognome'";
        if($_SESSION['ruolo'] != 0){
            $sql = $sql . " AND dipendente.id_azienda = " . $_SESSION['ruolo'] . ";";
        }
    } else if($nome != "" && $cognome == ""){
        $sql = "SELECT * FROM permesso INNER JOIN dipendente ON permesso.id_dipendente = dipendente.id WHERE nome = '$nome'";
        if($_SESSION['ruolo'] != 0){
            $sql = $sql . " AND dipendente.id_azienda = " . $_SESSION['ruolo'] . ";";
        }
    } else {
        $sql = "SELECT * FROM permesso INNER JOIN dipendente ON permesso.id_dipendente = dipendente.id WHERE nome = '$nome' AND cognome = '$cognome'";
        if($_SESSION['ruolo'] != 0){
            $sql = $sql . " AND dipendente.id_azienda = " . $_SESSION['ruolo'] . ";";
        }
    }
    $result = $connessione->query($sql);

    $res = $result->fetch_all();

    echo "Nome Cognome Data Ora Inizio Ora Fine </br>";

    foreach ($res as $r) {
        //stampa nome e cognome giorno e orario di inizio e fine
        echo $r[6] . " ". $r[7] . " " . $r[2] . " " . $r[3] . " " . $r[4] . " ". ' <button class="delete-btn" data-id="' . $r[0] . '">Delete</button></div>' . "<br>";
    }
?>