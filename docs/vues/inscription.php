<?php
session_start(); ?>

<!DOCTYPE html>
<html lang='fr'>
<head>
    <link href="css/inscription.css" rel="stylesheet">
    <link href="css/menu.css" rel="stylesheet">
    <script src="js/acceuil.js"></script>
</head>
<header>
    <div class="hamburger-menu">
        <input id="menu__toggle" type="checkbox" />
        <label class="menu__btn" for="menu__toggle">
            <span></span>
        </label>

        <ul class="menu__box">
            <li><a class="menu__item" href="accueil.php">Acceuil</a></li>
            <li><a class="menu__item" href="liste-produit.php">Liste Des Produits</a></li>
            <li><a class="menu__item" href="admin.php">Administrateur</a></li>
            <li><a class="menu__item" href="panier.php">Panier</a></li>
        </ul>
    </div>
    <h1 onclick="goPageAccueil()">Arbre du Savoir</h1>
    <img onclick="goPageAccueil()" src='../images/logo.png' alt='Programmer en C' width='90px' height='80px'>
</header>
<body>
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