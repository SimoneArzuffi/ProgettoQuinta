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
            
            <input type="button" id="button" value="mostra">
        </form>

        <div id="tabella">

        </div> 

        <script src="js/apiMostraAziende.js"></script>

        <a href="index.php">Torna alla home</a>
    </body>
</html>