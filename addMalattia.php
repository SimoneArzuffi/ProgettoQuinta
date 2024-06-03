<?php
    session_start();
    include "connection.php";

    if (!isset($_SESSION['POST'])) {
        $_SESSION['message'] = "Nessun dato inviato.";
        $_SESSION['message_type'] = "error";
        header("Location: inserisciMalattia.php");
        exit();
    }

    $post = $_SESSION['POST'];
    unset($_SESSION['POST']); // Clear session data to prevent resubmission

    // Get dipendente id
    $la_query = "SELECT id FROM dipendente WHERE nome = ? AND cognome = ?";
    $stmt = $connessione->prepare($la_query);
    $stmt->bind_param("ss", $post['nome'], $post['cognome']);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows == 1) {
        $un_record = $result->fetch_assoc();
        $id = $un_record['id'];
        $result->close();
    } else {
        $_SESSION['message'] = "Dipendente non trovato o duplicato.";
        $_SESSION['message_type'] = "error";
        $stmt->close();
        $connessione->close();
        header("Location: inserisciMalattia.php");
        exit();
    }

    $stmt->close();

    // Insert new malattia record
    $la_query = "INSERT INTO malattia (id_dipendente, numero_malattia, data_inizio, data_fine, giorni) VALUES (?, ?, ?, ?, ?)";
    $stmt = $connessione->prepare($la_query);
    $stmt->bind_param("issss", $id, $post['numero_malattia'], $post['data_inizio'], $post['data_fine'], $post['giorni']);

    if ($stmt->execute()) {
        $_SESSION['message'] = "Malattia aggiunta con successo!";
        $_SESSION['message_type'] = "success";
    } else {
        $_SESSION['message'] = "Errore nell'aggiungere la malattia: " . $stmt->error;
        $_SESSION['message_type'] = "error";
    }

    $stmt->close();
    $connessione->close();

    header("Location: inserisciMalattia.php");
    exit();
?>
