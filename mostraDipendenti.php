<?php
    session_start();
?>
<!DOCTYPE html>
<html>
    <head>
        <link rel="stylesheet" href="file_css/mostra.css">
    </head>

    <body>

        <form>
            <!-- inserisci campi per ricerca dipendente -->
            <input type="text" id="nome" placeholder="Nome">
            <input type="text" id="cognome" placeholder="Cognome">
            
            <input type="button" id="button" value="mostra">
        </form>

        <div id="tabella">

        </div> 

        <script src="js/apiMostraDipendente.js"></script>

        <a href="home.php">Torna alla home</a>
    </body>
</html>