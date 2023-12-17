<?php
	include "connection.php";

    session_start();
    $post = $_SESSION['POST'];

    $passwordCrittografata = password_hash($post['password'], PASSWORD_DEFAULT);


	$la_query = "SELECT * FROM gestore";

	if($risultati=$connessione->query($la_query)) {
		$la_query = "INSERT INTO gestore (email, password) VALUES ('" . $post['email'] . "', '" . $passwordCrittografata . "')";
	}

	$connessione->close();

    header('Location: /www/login.php');
?>