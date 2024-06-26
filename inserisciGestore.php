<!DOCTYPE html>
<html>
    <?php
        session_start();
        include "connection.php";
        if(isset($_POST["nome"]) && isset($_POST["cognome"]) && isset($_POST["email"]) && isset($_POST["password"]) && isset($_POST["azienda"])){
            $_SESSION['POST'] = $_POST;
            header('Location: /www/addGestore.php');
        }
    ?>
    <head>
        <title>Inserisci Gestore</title>
        <style>
            body {
                font-family: Arial, sans-serif;
                margin: 0;
                padding: 0;
                background-color: #f4f4f4;
            }

            form {
                width: 300px;
                margin: 50px auto;
                background-color: #fff;
                padding: 20px;
                border-radius: 8px;
                box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            }

            input[type="text"],
            input[type="email"],
            input[type="password"],
            input[type="submit"],
            input[type="button"] {
                width: calc(100% - 10px);
                padding: 10px;
                margin-bottom: 15px;
                border: 1px solid #ccc;
                border-radius: 5px;
                font-size: 16px;
				resize: none;
            }

			input[type="button"]{
				background-color: #0056b3;
				color: #fff;
				cursor: pointer;
			}
            input[type="submit"]:hover {
                background-color: #218838;
            }

            input[type="submit"]{
                background-color: #4caf50;
                color: #fff;
                cursor: pointer;
            }

            input[type="submit"]:hover
            {
                background-color: #218838;
            }
			a {
                display: block;
                margin-top: 10px;
                text-align: center;
                text-decoration: none;
                color: #007bff;
            }

			a:hover {
                text-decoration: underline;
            }

            .message {
                width: 300px;
                margin: 0 auto 15px;
                padding: 10px;
                border-radius: 5px;
                text-align: center;
            }

            .success {
                background-color: #d4edda;
                color: #155724;
                border: 1px solid #c3e6cb;
            }

            .error {
                background-color: #f8d7da;
                color: #721c24;
                border: 1px solid #f5c6cb;
            }
        </style>
    </head>
    <body>
        <?php
            if (isset($_SESSION['message'])) {
                echo '<div class="message ' . $_SESSION['message_type'] . '">' . $_SESSION['message'] . '</div>';
                unset($_SESSION['message']);
                unset($_SESSION['message_type']);
            }
        ?>
        <form action="inserisciGestore.php" method="POST">
            <p>Inserisci il nome del gestore</p>
            <input type="text" name="nome" placeholder="Nome" required><br><br>
            <p>Inserisci il cognome del gestore</p>
            <input type="text" name="cognome" placeholder="Cognome" required><br><br>
            <p>Inserisci l'email del gestore</p>
            <input type="email" name="email" placeholder="Email" required><br><br>
            <p>Inserisci la password del gestore</p>
            <input type="password" name="password" placeholder="Password" required>
            <input type="button" onclick="myFunction()" value="Mostra Password"><br><br>
            <script src="js/mostraPsw.js"></script>
            <?php
                $sql = "SELECT * FROM azienda";
                $result = $connessione->query($sql);
                if($result->num_rows > 0){
                    echo "<select name='azienda' id='azienda'>";
                    echo "<option value='0'>Admin</option>";
                    while($row = $result->fetch_assoc()){
                        echo "<option value='".$row['id']."'>" . $row['nome'] . "</option>";
                    }
                    echo "</select>";
                }
            ?>
            <input type="submit" value="Inserisci Gestore"><br><br>
            <a href="index.php">Torna alla Home</a>
        </form>
    </body>
</html>
