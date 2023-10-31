<?php

include_once(__DIR__."/../controlleurs/UtilisateurControlleur.php");
$utilisateurControlleur = new \controlleurs\UtilisateurControlleur();
session_start();
unset($_SESSION['mail_utilisateur']);

if (isset($_POST['sub'])) {
    $utilisateurControlleur->authentification($_POST['mailUser']);


    $_SESSION['mail_utilisateur'] = $_POST['mailUser'];
    header('Location: index.php');
}
?>

<!DOCTYPE html>
<html lang='fr'>
<head>
    <link href="css/authentification.css" rel="stylesheet">
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
<form method="post">
    <div class='body'>
        <div class='authTitre'>
            <h1>S'authentifier</h1>
        </div>
        <div class='authMail'>
            <h3 class='text'>Adresse mail :</h3>
            <input name='mailUser' type='text' required>
        </div>

        <div class='authMdp'>
            <h3 class='text'>Mot de passe :</h3>
            <input name='passUser' type='password' required>
        </div>
        <div class='authInsc'>
            <a class='text' href="inscription.php">S'inscrire</a>
        </div>

        <div class='authBouton'>
            <input name='sub' class='boutton' type='submit'  value='Sauthentifier'>
        </div>
    </div>
</form>
<footer>
    <h3>Condition d'utilisation</h3>
    <h3>Date mise à jour</h3>
    <h3>Réseaux sociaux</h3>
</footer>
</html>