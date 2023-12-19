<!DOCTYPE html>
<html>
    <?php
        session_start();
        //controllo se i dati sono stati inseriti e basta
        if(isset($_POST['nome']) && isset($_POST['cognome']) && isset($_POST['data']) && isset($_POST['ora_di_inizio']) && isset($_POST['ora_di_fine'])){
            $_SESSION['POST'] = $_POST;
            header("Location: addPermessi.php");
        }
    ?>
    <head>
        <title>
            inserisci permessi
        </title>
    </head>
    <body>
        <form action="inserisciPermessi.php" method="POST">
            <p>inserisci il nome del dipendente</p>
            <input type="nome" name="nome" placeholder="nome" required><br><br>
            <p>inserisci il cognome del dipendente</p>
            <input type="cognome" name="cognome" placeholder="cognome" required><br><br>
            <p>inserisci la data della richista di permesso</p>
            <input type="date" name="data" placeholder="data" required><br><br>
            <p>inserisci l'ora di inizio</p>
            <input type="time" min="0" name="ora_di_inizio" placeholder="ora di inizio" required><br><br>
            <p>inserisci l'ora di fine</p>
            <input type="time" min="0" name="ora_di_fine" placeholder="ora di fine" required><br><br>
            <input type="submit" value="inserisci permesso">
        </form><br>
        <a href="home.php">torna alla home</a>
    </body>
</html>