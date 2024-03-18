<?php
header('Content-Type: application/json');

// Parametri di connessione al database
$host = 'localhost';
$dbname = 'progetto_quinta';
$username = 'root';
$password = '';

// Connessione al database
try {
    $pdo = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
} catch (PDOException $e) {
    die("Errore di connessione al database: " . $e->getMessage());
}

// Estrai il parametro id dall'URL
$id = isset($_GET['id']) ? intval($_GET['id']) : null;

if ($id) {
    // Query per i permessi di un singolo dipendente
    $stmt = $pdo->prepare("SELECT * FROM permesso WHERE id_dipendente = :id");
    $stmt->execute(['id' => $id]);
    $permessi = $stmt->fetchAll(PDO::FETCH_ASSOC);
    echo json_encode($permessi);
} else {
    // Risposta in caso di ID mancante o non valido
    echo json_encode(['error' => 'ID dipendente non valido o mancante.']);
}

?>