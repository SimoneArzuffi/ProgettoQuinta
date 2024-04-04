<!DOCTYPE html>
<html>
    <?php
        session_start();
        if(isset($_POST["nome"]) && isset($_POST["cognome"]) && isset($_POST["data_di_nascita"]) && isset($_POST["cf"])){
            $_SESSION['POST'] = $_POST;
            header('Location: addDipendente.php');
        }
    ?>
    <head>
        <title>Inserisci Dipendente</title>
        <style>
            body {
                font-family: Arial, sans-serif;
                margin: 0;
                padding: 20px;
                background-color: #f4f4f4;
            }

            form {
                width: 300px;
                margin: 0 auto;
                padding: 20px;
                background-color: #fff;
                border-radius: 8px;
                box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            }

            p {
                margin-top: 10px;
                margin-bottom: 5px;
            }

            input[type="text"],
            input[type="date"],
            input[type="submit"] {
                width: calc(100% - 10px);
                padding: 10px;
                margin-bottom: 15px;
                border: 1px solid #ccc;
                border-radius: 5px;
                font-size: 16px;
            }

            input[type="submit"] {
                background-color: #4caf50;
                color: #fff;
                cursor: pointer;
            }

            input[type="submit"]:hover {
                background-color: #0056b3;
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

            select {
                width: calc(100% - 20px);
                padding: 10px;
                margin-bottom: 15px;
                border: 1px solid #ccc;
                border-radius: 5px;
                font-size: 16px;
                transition: all 0.3s ease;
            }

            select {
                display: block;
                width: 100%;
                cursor: pointer;
            }
        </style>
    </head>
    <body>
        <form action="inserisciDipendente.php" method="POST">
            <p>Inserisci il nome del dipendente</p>
            <input type="text" name="nome" placeholder="Nome" required><br>
            <p>Inserisci il cognome del dipendente</p>
            <input type="text" name="cognome" placeholder="Cognome" required><br>
            <p>Inserisci il codice fiscale del dipendente</p>
            <input type="text" name="cf" placeholder="Codice Fiscale" style="text-transform: uppercase;" required><br>
            <p>Inserisci la data di nascita del dipendente</p>
            <input type="date" name="data_di_nascita" placeholder="Data di nascita" required><br>

            <input type="submit" value="Inserisci Dipendente">
        </form>
        <br>
        <a href="index.php">Torna alla Home</a>
    </body>
</html>
