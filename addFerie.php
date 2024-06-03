<?php
    session_start();
    include "connection.php";

    if (!isset($_SESSION['POST'])) {
        $_SESSION['message'] = "Nessun dato inviato.";
        $_SESSION['message_type'] = "error";
        header("Location: inserisciFerie.php");
        exit();
    }

    $post = $_SESSION['POST'];
    unset($_SESSION['POST']); // Clear session data to prevent resubmission

    // Check if the dipendente exists
    $la_query = "SELECT id FROM dipendente WHERE nome = ? AND cognome = ?";
    $stmt = $connessione->prepare($la_query);
    $stmt->bind_param("ss", $post['nome'], $post['cognome']);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows != 1) {
        $_SESSION['message'] = "Dipendente non trovato.";
        $_SESSION['message_type'] = "error";
        $stmt->close();
        $connessione->close();
        header("Location: inserisciFerie.php");
        exit();
    }

    $un_record = $result->fetch_array(MYSQLI_ASSOC);
    $id = $un_record['id'];
    $stmt->close();

    // Insert ferie
    $la_query = "INSERT INTO ferie (id_dipendente, data_inizio, data_fine, giorni) VALUES (?, ?, ?, ?)";
    $stmt = $connessione->prepare($la_query);
    $stmt->bind_param("issi", $id, $post['data_inizio'], $post['data_fine'], $post['giorni']);

    if ($stmt->execute()) {
        $_SESSION['message'] = "Ferie aggiunte con successo!";
        $_SESSION['message_type'] = "success";
    } else {
        $_SESSION['message'] = "Errore nell'aggiungere le ferie: " . $stmt->error;
        $_SESSION['message_type'] = "error";
    }

    $stmt->close();
    $connessione->close();

    header("Location: inserisciFerie.php");
    exit();
?>
