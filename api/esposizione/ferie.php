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
    // Query per le ferie di un singolo dipendente
    $stmt = $pdo->prepare("SELECT * FROM ferie WHERE id_dipendente = :id");
    $stmt->execute(['id' => $id]);
    $ferie = $stmt->fetchAll(PDO::FETCH_ASSOC);
    echo json_encode($ferie);
} else {
    // Query per tutte le ferie
    $stmt = $pdo->query("SELECT * FROM ferie");
    $tutte_ferie = $stmt->fetchAll(PDO::FETCH_ASSOC);
    echo json_encode($tutte_ferie);
}

?>