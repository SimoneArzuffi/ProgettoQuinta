<!DOCTYPE html>
<html>
<head>
    <title>Prova mostra ferie</title>
</head>
<body>
    <h1>Mostra ferie</h1>
    <form action="provaMostraFerie.php" method="post">
        <input type="text" id="nome" placeholder="Nome">
        <input type="text" id="cognome" placeholder="Cognome">
        <input type="button" id="mostra" value="mostra">
    </form>
    <div id="tabella">
    </div>

    <script src="js/apiMostraFerie.js"></script>

    <a href="index.php">Torna alla home</a>
</body>