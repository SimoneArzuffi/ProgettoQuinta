<!DOCTYPE html>
<html>
<head>
    <title>Mostra permessi</title>
</head>
<body>
    <h1>Mostra permessi</h1>
    <form action="provaMostraPermessi.php" method="post">
        <input type="text" id="nome" placeholder="Nome">
        <input type="text" id="cognome" placeholder="Cognome">
        <input type="button" id="mostra" value="mostra">
    </form>
    <div id="tabella">
    </div>

    <script src="js/apiMostraPermessi.js"></script>

    <a href="index.php">Torna alla home</a>
</body>