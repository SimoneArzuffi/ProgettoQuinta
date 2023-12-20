<!DOCTYPE html>
<html>
    <?php
        session_start();
        if(isset($_POST['nome']) && isset($_POST['cognome']) && isset($_POST['numero_malattia']) && isset($_POST['data_inizio']) && isset($_POST['data_fine']) && isset($_POST['giorni'])){
            //controllo se data inizio è minore di data fine
            if($_POST['data_inizio'] > $_POST['data_fine']){
                echo "data inizio maggiore di data fine";
            }else{
                //controlla se il numero di giorni inserito corrisponde alla differenza tra data inizio e data fine maggioarata di 1
                $data_inizio = new DateTime($_POST['data_inizio']);
                $data_fine = new DateTime($_POST['data_fine']);
                $differenza = $data_inizio->diff($data_fine);
                if($differenza->days != $_POST['giorni'] - 1){
                    echo "numero giorni non corrispondente alla differenza tra la data di inizio e la data di fine";
                }else{
                    //controlla se il numero di malattia è numerico e di 9 cifre
                    if(!is_numeric($_POST['numero_malattia']) || strlen($_POST['numero_malattia']) != 9){
                        echo "numero malattia non valido";
                    }else{
                        $_SESSION['POST'] = $_POST;
                        header('Location: /www/addMalattia.php');
                    }
                }
            }
        }
    ?>
    <head>
        <title>
            inserisci malattia
        </title>
    </head>
    <body>
        <form action="inserisciMalattia.php" method="POST">
            <p>inserisci il nome del dipendente</p>
            <input type="nome" name="nome" placeholder="nome" required><br><br>
            <p>inserisci il cognome del dipendente</p>
            <input type="cognome" name="cognome" placeholder="cognome" required><br><br>
            <p>inserisci il numero di malattia</p>
            <input type="text" minlength="9" maxlength="9" name="numero_malattia" placeholder="numero malattia" required><br><br>
            <p>inserisci la data di inizio</p>
            <input type="date" name="data_inizio" placeholder="data inizio" required><br><br>
            <p>inserisci la data di fine</p>
            <input type="date" name="data_fine" placeholder="data fine" required><br><br>
            <p>inserisci il numero di giorni</p>
            <input type="number" min="0" name="giorni" placeholder="giorni" required><br><br>
            <input type="submit" value="inserisci malattia">
        </form><br>
        <a href="home.php">torna alla home</a>
</html>