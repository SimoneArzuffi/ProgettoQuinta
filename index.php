<!DOCTYPE html>
<html>
    <head>
        <title>Home Page</title>
        <style>
            body {
                font-family: Arial, sans-serif;
                margin: 0;
                padding: 0;
                background-color: #f4f4f4;
            }

            .container {
                width: 80%;
                margin: 50px auto;
                text-align: center;
            }

            .button-container {
                display: flex;
                flex-wrap: wrap;
                justify-content: center;
                gap: 10px;
                margin-bottom: 20px;
            }

            input[type="submit"] {
                padding: 10px 20px;
                font-size: 16px;
                background-color: #4caf50;
                color: #fff;
                border: none;
                border-radius: 5px;
                cursor: pointer;
            }

            input[type="submit"]:hover {
                background-color: #45a049;
            }
        </style>
    </head>
    <?php
        session_start();
        if (!isset($_SESSION['nome'])) {
            header("Location: login.php");
        }
    ?>
    <body>
        <div class="container">
            <h1>Benvenuto, <?php echo $_SESSION['nome']; ?>!</h1>
            <p>Login effettuato con successo.</p>

            <div class="button-container">
                <form action="inserisciGestore.php" method="POST"><input type="submit" value="Inserisci Gestore"></form>
                <form action="inserisciDipendente.php" method="POST"><input type="submit" value="Inserisci Dipendente"></form>
                <form action="mostraDipendenti.php" method="post"><input type="submit" value="Mostra Dipendenti"></form>
                <form action="inserisciFerie.php" method="POST"><input type="submit" value="Inserisci Ferie"></form>
                <form action="mostraFerie.php" method="POST"><input type="submit" value="Prova Mostra Ferie"></form><br>
                <form action="inserisciMalattia.php" method="POST"><input type="submit" value="Inserisci Malattia"></form>
                <form action="mostraMalattia.php" method="POST"><input type="submit" value="Prova Mostra Malattia"></form>
                <form action="inserisciPermessi.php" method="POST"><input type="submit" value="Inserisci Permessi"></form>
                <form action="mostraPermessi.php" method="POST"><input type="submit" value="Prova Mostra Permessi"></form>
                <form action="logout.php" method="POST"><input type="submit" value="Logout"></form>
            </div><br><br><br>

            <p>area funzionalità in fase di creazione e test</p>
            <div>
                
            </div>
        </div>
    </body>
</html>
