<?php
    session_start();
    include "connection.php";

    if (!isset($_SESSION['POST'])) {
        $_SESSION['message'] = "Nessun dato inviato.";
        $_SESSION['message_type'] = "error";
        header("Location: inserisciGestore.php");
        exit();
    }

    $post = $_SESSION['POST'];
    unset($_SESSION['POST']); // Clear session data to prevent resubmission

    // Check if the gestore already exists
    $la_query = "SELECT * FROM gestore WHERE email = ?";
    $stmt = $connessione->prepare($la_query);
    $stmt->bind_param("s", $post['email']);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        $_SESSION['message'] = "Gestore con questa email esiste già.";
        $_SESSION['message_type'] = "error";
        $stmt->close();
        $connessione->close();
        header("Location: inserisciGestore.php");
        exit();
    }

    $stmt->close();

    // Insert new gestore
    $la_query = "INSERT INTO gestore (nome, cognome, email, password, ruolo) VALUES (?, ?, ?, ?, ?)";
    $stmt = $connessione->prepare($la_query);
    $password_hashed = password_hash($post['password'], PASSWORD_DEFAULT);
    $stmt->bind_param("sssss", $post['nome'], $post['cognome'], $post['email'], $password_hashed, $post['azienda']);

    if ($stmt->execute()) {
        $_SESSION['message'] = "Gestore aggiunto con successo!";
        $_SESSION['message_type'] = "success";
    } else {
        $_SESSION['message'] = "Errore nell'aggiungere il gestore: " . $stmt->error;
        $_SESSION['message_type'] = "error";
    }

    $stmt->close();
    $connessione->close();

    header("Location: inserisciGestore.php");
    exit();
?>
