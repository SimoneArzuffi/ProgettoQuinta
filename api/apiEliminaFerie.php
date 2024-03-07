<?php
    include "connection.php";

    $id = $_POST['id'];

    $sql = "DELETE FROM `ferie` WHERE id = $id";

    if(!$connessione->query($sql)){
        die('Errore query: ' . $connessione->error);
    }

    $connessione->close();
?>