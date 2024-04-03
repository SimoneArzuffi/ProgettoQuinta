<?php
    include "../connection.php";

    $nome = $_POST['nome'];
    $cognome = $_POST['cognome'];

    if($nome == "" && $cognome == ""){
        $sql = "SELECT * FROM malattia INNER JOIN dipendente ON malattia.id_dipendente = dipendente.id";
    } else if($nome == "" && $cognome != ""){
        $sql = "SELECT * FROM malattia INNER JOIN dipendente ON malattia.id_dipendente = dipendente.id WHERE cognome = '$cognome'";
    } else if($nome != "" && $cognome == ""){
        $sql = "SELECT * FROM malattia INNER JOIN dipendente ON malattia.id_dipendente = dipendente.id WHERE nome = '$nome'";
    } else {
        $sql = "SELECT * FROM malattia INNER JOIN dipendente ON malattia.id_dipendente = dipendente.id WHERE nome = '$nome' AND cognome = '$cognome'";
    }

    $result = $connessione->query($sql);

    $res = $result->fetch_all();

    foreach ($res as $r) {
        
        echo $r[7] . " ". $r[8] . " " . $r[2] . " " . $r[3] . " " . $r[4] . " " . ' <button class="delete-btn" data-id="' . $r[0] . '">Delete</button></div>' . "<br>";
    }

    $connessione -> close();
?>