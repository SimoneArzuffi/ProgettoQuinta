<!DOCTYPE html>
<html>
    <?php
        session_start();
        //controllo se i dati sono stati inseriti e basta
        if(isset($_POST['nome']) && isset($_POST['cognome']) && isset($_POST['data']) && isset($_POST['numero_di_ore'])){
                $_SESSION['POST'] = $_POST;
                header('Location: /www/addPermessi.php');
        }
    ?>
    <head>
        <title>
            inserisci permessi
        </title>
    </head>
    <body>
        <form action="inserisciPermessi.php" method="POST">
            <input type="nome" name="nome" placeholder="nome" required><br><br>
            <input type="cognome" name="cognome" placeholder="cognome" required><br><br>
            <input type="date" name="data" placeholder="data" required><br><br>
            <input type="number" min="0" name="numero_di_ore" placeholder="numero di ore" required><br><br>
            <input type="submit" value="inserisci permessi">
        </form><br>
        <a href="home.php">torna alla home</a>
    </body>
</html>