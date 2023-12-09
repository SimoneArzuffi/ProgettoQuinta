<?php
	include "connection.php";

    session_start();
    $post = $_SESSION['POST'];

    $passwordCrittografata = password_hash($post['password'], PASSWORD_DEFAULT);

    $la_query = "INSERT INTO utente (nome, cognome, password) VALUES ('" . $post['nome'] . "', '" . $post['cognome'] . "', '" . $passwordCrittografata . "')";
	echo("La mia query [<span style='font-weight:bold;'>".$la_query."</span>]<br/><br/>");
	
	if ($connessione->query($la_query))
	{
		echo "Record aggiunto!<br/>";
		echo "Il suo id e' ".$connessione->insert_id;
	}
	else
		echo "Errore: ".$la_query."<br/>".$connessione->error;
	$connessione->close();

    header('Location: /progettoQuinta/login.php');
?>