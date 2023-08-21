<!DOCTYPE html>
<html>

<head>
    <title>Form di Validazione</title>

    <style>
        @import url('CSS/style.css');
    </style>
</head>

<body>

    <?php

    $messaggioErrore = array(
        'nome' => '',
        'password' => '',
        'cellulare' => ''
    );

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $nome = $_POST['nome'];
        $password = $_POST['password'];
        $cellulare = $_POST['cellulare'];

        if (!preg_match('/^[A-Z][a-z]* [A-Z][a-z]*( [A-Z][a-z]*)*$/', $nome)) {
            $messaggioErrore['nome'] = 'Nome e cognome devono iniziare con una maiuscola e il resto minuscolo. <br> 
            Separare evenutali secondi nomi o cognomi da spazi.';
        }

        if (!preg_match("/((?=.[a-z])(?=.[0-9])(?=.*[^a-zA-Z0-9]).{3})/i", $password)) {
            $messaggioErrore['password'] = 'La password deve essere formata da due gruppi di tre caratteri che si ripetono. <br>
             Ogni gruppo dovrà avere al suo interno obbligatoriamente un numero, una lettera e un carattere speciale. Non importa l\'ordine.<br>
             Deve avere una lunghezza di minimo 8 caratteri.';
        }

        if (!preg_match('/^3\d{9}$/', $cellulare)) {
            $messaggioErrore['cellulare'] = 'Il numero di cellulare deve essere esattamente 10 cifre. <br>
            Il numero deve iniziare con il numero 3.';
        }
    }
    ?>

    <h2>Form Validator</h2>

    <form method="post">

        <label for="nome">Nome completo:</label>
        <input type="text" name="nome" value="<?php echo $_POST['nome'] ?? ''; ?>">
        <p>
            <?php echo $messaggioErrore['nome']; ?>
        </p>
        <br><br>

        <label for="password">Password:</label>
        <input type="password" name="password" value="<?php echo $_POST['password'] ?? ''; ?>">
        <p>
            <?php echo $messaggioErrore['password']; ?>
        </p>
        <br><br>

        <label for="cellulare">Numero di Cellulare:</label>
        <input type="text" name="cellulare" value="<?php echo $_POST['cellulare'] ?? ''; ?>">
        <p>
            <?php echo $messaggioErrore['cellulare']; ?>
        </p>
        <br><br>

        <input type="submit" value="Invia">

    </form>


</body>

</html>
