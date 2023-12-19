<!DOCTYPE html>
<html>
    <?php
        session_start();
        if(isset($_POST['nome']) && isset($_POST['cognome']) && isset($_POST['data_inizio']) && isset($_POST['data_fine']) && isset($_POST['giorni'])){
            $_SESSION['POST'] = $_POST;
            header('Location: /www/addFerie.php');
        }
    ?>
    <head>
        <title>
            inserisci ferie
        </title>
    </head>
    <body>
        <!-- inserisci la possibilita di inserire un nuovo dipendente -->
        <form action="inserisciFerie.php" method="POST">
            <input type="nome" name="nome" placeholder="nome" required><br><br>
            <input type="cognome" name="cognome" placeholder="cognome" required><br><br>
            <input type="date" name="data_inizio" placeholder="data inizio" required><br><br>
            <input type="date" name="data_fine" placeholder="data fine" required><br><br>
            <input type="number" min="0" name="giorni" placeholder="giorni" required><br><br>
            <input type="submit" value="inserisci ferie">
        </form><br>
        <a href="home.php">torna alla home</a>
    </body>
</html>