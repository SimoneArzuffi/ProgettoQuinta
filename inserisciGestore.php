<!DOCTYPE html>
<html>
	<?php
		session_start();
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
			<input type="submit" value="inserisci gestore"><br><br>
			<a href="home.php">torna alla home</a>
		</form>
	</body>
</html>