<?php
	include "connection.php";

    session_start();
    $post = $_SESSION['POST'];
    $la_query = "SELECT * FROM utente WHERE nome='" . $post['nome'] . "'" . "AND cognome='" . $post['cognome'] . "'";
	
	if(!$risultati=$connessione->query($la_query)) {
		echo("Errore nell'esecuzione della query: ".$connessione->error.".");
		exit();
	} else {
		echo("Dalla tabella ho estratto ".$risultati->num_rows." record(s):<br/><br/>");
		if($risultati->num_rows == 1)  
		{
			$un_record = $risultati->fetch_array(MYSQLI_ASSOC);
            if(password_verify($post['password'], $un_record['password'])){
                header('Location: /progettoQuinta/index.php');
            }else{
                echo "falso";
            }
			$risultati->close();
		}else{
            header("Location: /progettoQuinta/login.php");
        }
	}
	$connessione->close();
?>