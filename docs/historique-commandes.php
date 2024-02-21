<?php

session_start();
if(!isset ($_SESSION['mail_utilisateur'])){
    header('Location: inscriptionAuthentification.php');
}

include_once(__DIR__ . "/controlleurs/CommandeControlleur.php");
$commandeControlleur = new \controlleurs\CommandeControlleur();

?>

<!DOCTYPE html>
<html lang='fr'>
<head>
    <meta charset='UTF-8'>
    <title>Arbre du Savoir</title>
    <link href="css/general.css" rel="stylesheet">
    <link href="css/historiqueCommandes.css" rel="stylesheet">
    <link href="css/menu.css" rel="stylesheet">
    <link href='https://fonts.googleapis.com/css?family=Montserrat' rel='stylesheet'>
</head>
<?php include("header.php") ?>
<body>
    <div class='body'>
        <div class='titre'>
            <h2>Historique de paiement</h2>
        </div>
        <?php
        $commandeControlleur->afficherToutesLesCommandesParUtilisateur();
        ?>
        <!--
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
      -->

    </div>
<footer>
    <h3>Condition d'utilisation</h3>
    <h3>Date mise à jour</h3>
    <h3>Réseaux sociaux</h3>
</footer>
</body>
<style>
    header {
        position: static;
    }
</style>
</html>
