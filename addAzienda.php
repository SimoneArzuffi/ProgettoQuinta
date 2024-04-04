<?php
    session_start();
    include "connection.php";
    $sql = "SELECT nome FROM azienda";
    
    $post = $_SESSION['POST']; // Assicurati che questa riga sia corretta. Potresti voler utilizzare $_POST direttamente se stai cercando di accedere ai dati inviati da un form.

    // Utilizzo di prepared statement per l'inserimento
    $sql = "INSERT INTO azienda (nome) VALUES (?);";
    $stmt = $connessione->prepare($sql);
    
    // "s" indica che il parametro è una stringa
    $stmt->bind_param("s", $post['nome']);
    
    if(!$stmt->execute()) {
        echo("Errore nell'esecuzione della query: " . $stmt->error);
        exit();
    } else {
        // Redirect se l'inserimento è riuscito
        header("Location: inserisciAzienda.php");
        exit();
    }
    
    // Non è necessario chiudere la connessione esplicitamente in script come questo, 
    // poiché verrà chiusa automaticamente alla fine dello script.
    

    $connessione -> close();

    header("Location: inserisciAzienda.php");

?>