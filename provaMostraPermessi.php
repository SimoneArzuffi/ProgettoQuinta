<!DOCTYPE html>
<html>
<head>
    <title>Prova mostra permessi</title>
</head>
<body>
    <h1>Prova mostra permessi</h1>
    <form action="provaMostraPermessi.php" method="post">
        <input type="text" id="nome" placeholder="Nome">
        <input type="text" id="cognome" placeholder="Cognome">
        <input type="button" id="mostra" value="mostra">
    </form>
    <div id="tabella">
    </div>

    <script src="js/apiMostraPermessi.js"></script>

    <a href="home.php">Torna alla home</a>
</body>