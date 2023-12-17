<!DOCTYPE html>
<html>
    <?php
        include "connection.php";
        $la_query = "SELECT * FROM gestore";
        //controlla se esiste la tabella gestore
        if(!$risultati=$connessione->query($la_query)) {
            echo("Errore nell'esecuzione della query: ".$connessione->error.".");
            exit();
        }
        //se esiste la tabella controlla che esista l'utente admin con email admin.progettoquinta@progettoquinta.com e password admin
        else {
            if($risultati->num_rows >= 1)  
            {
                $un_record = $risultati->fetch_array(MYSQLI_ASSOC);
                if(password_verify("admin", $un_record['password']) && $un_record['email'] == "admin.progettoquinta@progettoquinta.com"){
                    header('Location: /www/login.php');
                }else{
                    $la_query = "INSERT INTO gestore (email, password) VALUES ('admin.progettoquinta@progettoquinta.com', '" . password_hash("admin", PASSWORD_DEFAULT) . "')";
                    header('Location: /www/login.php');
                }
                $risultati->close();
            }else{
                $la_query = "INSERT INTO gestore (email, password) VALUES ('admin.progettoquinta@progettoquinta.com', '" . password_hash("admin", PASSWORD_DEFAULT) . "')";
                $risultati -> close();
                header('Location: /www/login.php');

            }
        }
        
    ?>
</html>