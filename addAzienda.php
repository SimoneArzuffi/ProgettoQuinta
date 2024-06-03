<?php
    session_start();
    include "connection.php";

    if (!isset($_SESSION['POST'])) {
        $_SESSION['message'] = "Nessun dato inviato.";
        $_SESSION['message_type'] = "error";
        header("Location: inserisciAzienda.php");
        exit();
    }

    $post = $_SESSION['POST'];
    unset($_SESSION['POST']); // Clear the session data to prevent resubmission

    $sql = "INSERT INTO azienda (nome) VALUES (?);";
    $stmt = $connessione->prepare($sql);
    $stmt->bind_param("s", $post['nome']);

    if ($stmt->execute()) {
        $_SESSION['message'] = "Azienda aggiunta con successo!";
        $_SESSION['message_type'] = "success";
    } else {
        $_SESSION['message'] = "Errore nell'aggiungere l'azienda: " . $stmt->error;
        $_SESSION['message_type'] = "error";
    }

    $stmt->close();
    $connessione->close();

    header("Location: inserisciAzienda.php");
    exit();
?>

