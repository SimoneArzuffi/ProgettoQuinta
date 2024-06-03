<?php
    session_start();
    include "connection.php";

    if (!isset($_SESSION['POST'])) {
        $_SESSION['message'] = "Nessun dato inviato.";
        $_SESSION['message_type'] = "error";
        header("Location: inserisciDipendente.php");
        exit();
    }

    $post = $_SESSION['POST'];
    unset($_SESSION['POST']); // Clear session data to prevent resubmission

    $cf = strtoupper($post['cf']);

    // Check if the dipendente already exists
    $la_query = "SELECT * FROM dipendente WHERE cf = ?";
    $stmt = $connessione->prepare($la_query);
    $stmt->bind_param("s", $cf);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        $_SESSION['message'] = "Dipendente già esistente con questo CF.";
        $_SESSION['message_type'] = "error";
        $stmt->close();
        $connessione->close();
        header("Location: inserisciDipendente.php");
        exit();
    }

    $stmt->close();

    // Prepare insert query for new dipendente
    $la_query = "INSERT INTO dipendente (nome, cognome, cf, data_di_nascita, id_azienda) VALUES (?, ?, ?, ?, ?)";
    $stmt = $connessione->prepare($la_query);
    $stmt->bind_param("ssssi", $post['nome'], $post['cognome'], $cf, $post['data_di_nascita'], $post['azienda']);

    if ($stmt->execute()) {
        $_SESSION['message'] = "Dipendente aggiunto con successo!";
        $_SESSION['message_type'] = "success";
    } else {
        $_SESSION['message'] = "Errore nell'aggiungere il dipendente: " . $stmt->error;
        $_SESSION['message_type'] = "error";
    }

    $stmt->close();
    $connessione->close();

    header("Location: inserisciDipendente.php");
    exit();
?>