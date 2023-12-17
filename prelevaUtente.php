<?php
	include "connection.php";

    session_start();
    $post = $_SESSION['POST'];
	//sistema query per prelevare utente deve controllare se esiste la tabella utente
    $la_query = "SELECT * FROM gestore WHERE email='" . $post['email'] . "'";

	
	if(!$risultati=$connessione->query($la_query)) {
		echo("Errore nell'esecuzione della query: ".$connessione->error.".");
		exit();
	} else {
		if($risultati->num_rows == 1)  
		{
			$un_record = $risultati->fetch_array(MYSQLI_ASSOC);
            if(password_verify($post['password'], $un_record['password'])){
                header('Location: /www/index.php');
            }else{
                echo "falso";
            }
			$risultati->close();
		}else{
            header("Location: /www/login.php");
        }
	}
	$connessione->close();
?>