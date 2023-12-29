<!DOCTYPE html>
<html>
    <?php
        session_start();
        if(isset($_POST['cf'])){
            $_SESSION['POST'] = $_POST;
            header('Location: /www/removeDipendente.php');
        }
    ?>
    <head>
        <title>Rimuovi Dipendente</title>
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
            input[type="submit"] {
                width: calc(100% - 10px);
                padding: 10px;
                margin-bottom: 15px;
                border: 1px solid #ccc;
                border-radius: 5px;
                font-size: 16px;
            }

            input[type="submit"] {
                background-color: #dc3545;
                color: #fff;
                cursor: pointer;
            }

            input[type="submit"]:hover {
                background-color: #c82333;
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
        <form action="rimuoviDipendente.php" method="POST">
            <p>Inserisci il codice fiscale del dipendente</p>
            <input type="text" name="cf" placeholder="Codice Fiscale" style="text-transform: uppercase;" required><br>
            <input type="submit" value="Rimuovi Dipendente">
        </form>
        <br>
        <a href="home.php">Torna alla Home</a>
    </body>
</html>
