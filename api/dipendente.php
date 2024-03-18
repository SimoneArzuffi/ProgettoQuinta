<?php
header('Content-Type: application/json');

// Parametri per la connessione al database
$host = 'localhost'; // o l'IP del tuo server MySQL
$dbname = 'progetto_quinta';
$username = 'root'; // o il tuo username per MySQL
$password = ''; // o la tua password per MySQL

// Connessione al database
try {
    $pdo = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
} catch (PDOException $e) {
    die("Errore di connessione al database: " . $e->getMessage());
}

// Estrai il parametro nome_utente dall'URL se presente
$nome_utente = isset($_GET['nome_utente']) ? $_GET['nome_utente'] : null;

// Prepara e esegui la query SQL in base al nome_utente
if ($nome_utente) {
    $sql = "SELECT * FROM dipendente WHERE nome = :nome_utente";
    $stmt = $pdo->prepare($sql);
    $stmt->bindParam(':nome_utente', $nome_utente, PDO::PARAM_STR);
} else {
    $sql = "SELECT * FROM dipendente";
    $stmt = $pdo->prepare($sql);
}

$stmt->execute();
$dipendenti = $stmt->fetchAll(PDO::FETCH_ASSOC);

// Restituisci i risultati in formato JSON
echo json_encode($dipendenti);

?>