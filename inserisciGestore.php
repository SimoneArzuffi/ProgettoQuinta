<!DOCTYPE html>
<html>
	<?php
		session_start();
		/*include "connection.php";
		$post = $_SESSION['POST'];
		//controlla se esiste il gestore che si vuole inserire
		$la_query = "SELECT * FROM gestore WHERE email = '" . $post['email'] . "'";
		if(!$risultati=$connessione->query($la_query)) {
			echo("Errore nell'esecuzione della query: ".$connessione->error.".");
			exit();
		}
		else {
			if($risultati->num_rows == 0)  
			{
				//esegui query per inserire il gestore
				$la_query = "INSERT INTO gestore (nome, cognome, email, password) VALUES ('" . $post['nome'] . "' , '" . $post['cognome'] . "', '" . $post['email'] . "', '" . password_hash($post['password'], PASSWORD_DEFAULT) . "')";
				if(!$risultati=$connessione->query($la_query)) {
					echo("Errore nell'esecuzione della query: ".$connessione->error.".");
					exit();
				}
				echo "gestore inserito con successo";
				$connessione -> close();
			}else{
				echo "gestore già esistente";
				
			}
		}*/

		if(isset($_POST["nome"]) && isset($_POST["cognome"]) && isset($_POST["email"]) && isset($_POST["password"])){
			$_SESSION['POST'] = $_POST;
			header('Location: /www/addGestore.php');
		}

	?>
	<head>
		<title>
			inserisci gestore
		</title>
	</head>
	<body>
		<!-- inserisci la possibilita di inserire un nuovo gestore -->
		<form action="inserisciGestore.php" method="POST">
			<input type="text" name="nome" placeholder="nome" required><br><br>
			<input type="text" name="cognome" placeholder="cognome" required><br><br>
			<input type="email" name="email" placeholder="email" required><br><br>
			<input type="password" name="password" placeholder="password" required>
			<input type="button" onclick="myFunction()" value="mostra password"><br><br>
            <script>
                function myFunction() {
                    var x = document.getElementsByName("password")[0];
                    if (x.type === "password") {
                        x.type = "text";
                    } else {
                        x.type = "password";
                    }
                }
            </script>
			<input type="submit" value="inserisci gestore">
		</form>
	</body>
</html>