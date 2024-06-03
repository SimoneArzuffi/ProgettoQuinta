<?php
    session_start();
?>
<!DOCTYPE html>
<html>
    <head>
        
        <script src="js/apiMostraDipendente.js"></script>
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
</body>
</html>