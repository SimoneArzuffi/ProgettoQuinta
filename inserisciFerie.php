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
                if($differenza->days != $_POST['giorni']){
                    echo "numero giorni non corrispondente alla differenza tra la data di inizio e la data di fine";
                }else{
                    $_SESSION['POST'] = $_POST;
                    header('Location: /www/addFerie.php');
                }
            }
        }
    ?>
    <head>
        <title>
            inserisci ferie
        </title>
    </head>
    <body>
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