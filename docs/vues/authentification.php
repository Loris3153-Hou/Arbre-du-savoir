<?php
session_start(); ?>

<!DOCTYPE html>
<html lang='fr'>
<head>
    <link href="css/authentification.css" rel="stylesheet">
    <link href="css/menu.css" rel="stylesheet">
</head>



<body>
    <?php include("header.php")?>
    <div class='body'>
        <div class='authTitre'>
            <h1>S'authentifier</h1>
        </div>
        <div class='authMail'>
            <h3 class='text'>Adresse mail :</h3>
            <input type='text' required>
        </div>

        <div class='authMdp'>
            <h3 class='text'>Mot de passe :</h3>
            <input type='text' required>
        </div>

        <div class='authBouton'>
            <input class='boutton' type='submit'  value='Sauthentifier'>
        </div>
    </div>
    <footer>
        <h3>Condition d'utilisation</h3>
        <h3>Date mise à jour</h3>
        <h3>Réseaux sociaux</h3>
    </footer>
    </body>
</html>