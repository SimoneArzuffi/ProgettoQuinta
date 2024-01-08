<!DOCTYPE html>
<html>
    <?php
        session_start();
        if(isset($_POST['nome']) && isset($_POST['cognome']) && isset($_POST['data_inizio']) && isset($_POST['data_fine']) && isset($_POST['giorni'])){
            //controllo se data inizio è minore di data fine
            if($_POST['data_inizio'] > $_POST['data_fine']){
                echo "data inizio maggiore di data fine";
            }else{
                //controlla se il numero di giorni inserito corrisponde alla differenza tra data inizio e data fine
                $data_inizio = new DateTime($_POST['data_inizio']);
                $data_fine = new DateTime($_POST['data_fine']);
                $differenza = $data_inizio->diff($data_fine);
                if($differenza->days != $_POST['giorni'] - 1){
                    echo "numero giorni non corrispondente alla differenza tra la data di inizio e la data di fine";
                }else{
                    $_SESSION['POST'] = $_POST;
                    header('Location: /www/addFerie.php');
                }
            }
        }
    ?>
    <head>
        <title>Inserisci Ferie</title>
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
                font-weight: bold;
            }

            input[type="text"],
            input[type="date"],
            input[type="number"],
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
        <form action="inserisciFerie.php" method="POST">
            <p>Inserisci il nome del dipendente</p>
            <input type="text" name="nome" placeholder="Nome" required><br>
            <p>Inserisci il cognome del dipendente</p>
            <input type="text" name="cognome" placeholder="Cognome" required><br>
            <p>inserisci il numero della malattia</p>
            <input type="text" minlength="9" maxlength="9" name="numero_malattia" placeholder="Numero malattia" required><br>
            <p>Inserisci la data di inizio</p>
            <input type="date" name="data_inizio" placeholder="Data inizio" required><br>
            <p>Inserisci la data di fine</p>
            <input type="date" name="data_fine" placeholder="Data fine" required><br>
            <p>Inserisci il numero di giorni</p>
            <input type="number" min="0" name="giorni" placeholder="Giorni" required><br>
            <input type="submit" value="Inserisci malattia">
        </form>
        <br>
        <a href="home.php">Torna alla Home</a>
    </body>
</html>
