<!DOCTYPE html>
<html>
<?php
    session_start();
    // Check if the form has been submitted
    if(isset($_POST["nome"])){
        $_SESSION['POST'] = $_POST;
        header('Location: addAzienda.php');
        exit();
    }
?>
<head>
    <title>Inserisci Dipendente</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 20px;
            background-color: #f4f4f4;
        }

        form {
            width: 300px;
            margin: 0 auto;
            padding: 20px;
            background-color: #fff;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        p {
            margin-top: 10px;
            margin-bottom: 5px;
        }

        input[type="text"],
        input[type="submit"] {
            width: calc(100% - 20px);
            padding: 10px;
            margin-bottom: 15px;
            border: 1px solid #ccc;
            border-radius: 5px;
            font-size: 16px;
        }

        input[type="submit"] {
            background-color: #4caf50;
            color: #fff;
            cursor: pointer;
        }

        input[type="submit"]:hover {
            background-color: #0056b3;
        }

        .message {
            width: 300px;
            margin: 0 auto 15px;
            padding: 10px;
            border-radius: 5px;
            text-align: center;
        }

        .success {
            background-color: #d4edda;
            color: #155724;
            border: 1px solid #c3e6cb;
        }

        .error {
            background-color: #f8d7da;
            color: #721c24;
            border: 1px solid #f5c6cb;
        }

        a {
            display: block;
            margin-top: 10px;
            text-align: center;
            text-decoration: none;
            color: #007bff;
        }

        a:hover {
            text-decoration: underline;
        }
    </style>
</head>
<body>
    <?php
    if (isset($_SESSION['message'])) {
        echo '<div class="message ' . $_SESSION['message_type'] . '">' . $_SESSION['message'] . '</div>';
        unset($_SESSION['message']);
        unset($_SESSION['message_type']);
    }
    ?>
    <form action="inserisciAzienda.php" method="POST">
        <p>Inserisci il nome dell'azienda</p>
        <input type="text" name="nome" placeholder="Nome" required><br>
        <input type="submit" value="Inserisci Azienda">
    </form>
    <br>
    <a href="index.php">Torna alla Home</a>
</body>
</html>
