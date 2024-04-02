<?php
    include "../connection.php";

    $nome = $_POST['nome'];
    $cognome = $_POST['cognome'];

    if($nome == "" && $cognome == ""){
        $sql = "SELECT * FROM permesso";
    } else if($nome == "" && $cognome != ""){
        $sql = "SELECT * FROM permesso WHERE cognome = '$cognome'";
    } else if($nome != "" && $cognome == ""){
        $sql = "SELECT * FROM permesso WHERE nome = '$nome'";
    } else {
        $sql = "SELECT * FROM permesso WHERE nome = '$nome' AND cognome = '$cognome'";
    }
    $result = $connessione->query($sql);

    $res = $result->fetch_all();

    foreach ($res as $r) {
        echo '<div class="permesso">' .
            $r[1] . " " . $r[2] . " " . $r[3] . " " . $r[4] . " " . ' <button class="delete-btn" data-id="' . $r[0] . '">Delete</button></div>';

    }
?>