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

// Estrai il parametro id dall'URL se presente
$id = isset($_GET['id']) ? intval($_GET['id']) : 0;

if ($id > 0) {
    // Query per un singolo dipendente
    $stmt = $pdo->prepare("SELECT * FROM dipendente WHERE id = :id");
    $stmt->execute(['id' => $id]);
    $result = $stmt->fetch(PDO::FETCH_ASSOC);
    echo $result ? json_encode($result) : json_encode(['error' => 'Dipendente non trovato.']);
} else {
    // Query per tutti i dipendenti
    $stmt = $pdo->query("SELECT * FROM dipendente");
    $dipendenti = $stmt->fetchAll(PDO::FETCH_ASSOC);
    echo json_encode($dipendenti);
}

?>