<?php

session_start();
if(!isset ($_SESSION['mail_utilisateur'])){
    header('Location: authentification.php');
}

?>

<!DOCTYPE html>
<html lang='fr'>
<head>
    <meta charset='UTF-8'>
    <title>Arbre du Savoir</title>
    <link href="css/historiqueCommandes.css" rel="stylesheet">
    <link href="css/menu.css" rel="stylesheet">
    <link href='https://fonts.googleapis.com/css?family=Montserrat' rel='stylesheet'>
</head>
<body>
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
    <img onclick="goPagePanier()" src='../images/panier.png' alt='Panier' width='70px' height='70px'>
    <img onclick="goPageAccueil()" src='../images/logo.png' alt='Programmer en C' width='90px' height='80px'>
</header>
<form method='post'>
    <div class='body'>
        <div class='titre'>
            <h2>Historique de paiement</h2>
        </div>

        <p class="date-commande">02 juillet 2022</p>
        <div class="rectangle-historique-commande">
            <div class="div1">
                <div class="div12"><p>Marketing digital</p></div>
                <div class="div22"><p>x1</p></div>
                <div class="div32"><p>180,75 $</p></div>
            </div>
            <div class="div2"><p class="totaux">Total articles</p></div>
            <div class="div3"><p class="totaux">1</p></div>
            <div class="div4"><p class="totaux">Montant total</p></div>
            <div class="div5"><p class="totaux">180,75 $</p></div>
        </div>

        <p class="date-commande">18 septembre 2021</p>
        <div class="rectangle-historique-commande">
            <div class="div1">
                <div class="div12"><p>Programmation en C</p></div>
                <div class="div22"><p>x1</p></div>
                <div class="div32"><p>152,00 $</p></div>
                <div class="div42"><p>Programmation en Java</p></div>
                <div class="div52"><p>x1</p></div>
                <div class="div62"><p>304,00 $</p></div>
            </div>
            <div class="div2"><p class="totaux">Total articles</p></div>
            <div class="div3"><p class="totaux">2</p></div>
            <div class="div4"><p class="totaux">Montant total</p></div>
            <div class="div5"><p class="totaux">456,00 $</p></div>
        </div>

    </div>
</form>
<footer>
    <h3>Condition d'utilisation</h3>
    <h3>Date mise à jour</h3>
    <h3>Réseaux sociaux</h3>
</footer>
</body>
</html>