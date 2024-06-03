<?php
    session_start();
?>
<!DOCTYPE html>
<html>
    <head>
        <link rel="stylesheet" type="text/css" href="file_css/mostra.css">
    </head>

    <body>
        <form>
            <Inserisci campi per ricerca dipendente>
            <input type="text" id="nome" placeholder="Nome">
            <input type="text" id="cognome" placeholder="Cognome">
            <input type="button" id="button" value="mostra">
        </form>
        <div id="tabella"></div>
        
        <a href="index.php">Torna alla home</a>

        <script src="js/apiMostraDipendente.js"></script>
    </body>
</html>