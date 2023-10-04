<?php
session_start(); ?>

<!DOCTYPE html>
<html lang='fr'>
<head>
    <link href="css/inscription.css" rel="stylesheet">
    <link href="css/menu.css" rel="stylesheet">
</head>



<body>
<?php include("header.php")?>
    <div class='body'>
        <div class='inscriptionTitre'>
            <h1>S'inscrire</h1>
        </div>
        <div class='inscriptionNom'>
            <h3 class='text'>Nom :</h3>
            <input type='text' required>
        </div>

        <div class='inscriptionPrenom'>
            <h3 class='text'>Prénom :</h3>
            <input type='text' required>
        </div>

        <div class='inscriptionDate'>
            <h3 class='text'>Date de naissance :</h3>
            <input type='date' required>
        </div>

        <div class='inscriptionMail'>
            <h3 class='text'>Adresse mail :</h3>
            <input type='text' required>
        </div>

        <div class='inscriptionMdp'>
            <h3 class='text'>Mot de passe :</h3>
            <input type='text' required>
        </div>

        <div class='inscriptionBouton'>
            <input class='boutton' type='submit'  value='Sinscrire'>
        </div>
    </div>
<footer>
    <h3>Condition d'utilisation</h3>
    <h3>Date mise à jour</h3>
    <h3>Réseaux sociaux</h3>
</footer>
</body>
</html>