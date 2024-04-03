<!DOCTYPE html>
<html>
    <?php
        session_start();
        if(isset($_POST['nome']) && isset($_POST['cognome']) && isset($_POST['data']) && isset($_POST['ora_di_inizio']) && isset($_POST['ora_di_fine'])){
            $_SESSION['POST'] = $_POST;
            header("Location: addPermessi.php");
        }
    ?>
    <head>
        <title>Inserisci Permessi</title>
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
            input[type="time"],
            input[type="submit"] {
                width: calc(100% - 10px);
                padding: 10px;
                margin-bottom: 15px;
                border: 1px solid #ccc;
                border-radius: 5px;
                font-size: 16px;
            }

            input[type="submit"] {
                background-color: #28a745;
                color: #fff;
                cursor: pointer;
            }

            input[type="submit"]:hover {
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
        </style>
    </head>
    <body>
        <form action="inserisciPermessi.php" method="POST">
            <p>Inserisci il nome del dipendente</p>
            <input type="text" name="nome" placeholder="Nome" required><br>
            <p>Inserisci il cognome del dipendente</p>
            <input type="text" name="cognome" placeholder="Cognome" required><br>
            <p>Inserisci la data della richiesta di permesso</p>
            <input type="date" name="data" required><br>
            <p>Inserisci l'ora di inizio</p>
            <input type="time" name="ora_di_inizio" required><br>
            <p>Inserisci l'ora di fine</p>
            <input type="time" name="ora_di_fine" required><br>
            <input type="submit" value="Inserisci Permesso">
        </form>
        <br>
        <a href="index.php">Torna alla Home</a>
    </body>
</html>
