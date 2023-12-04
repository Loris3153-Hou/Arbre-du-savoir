<?php

session_start();
if(!isset ($_SESSION['mail_utilisateur'])){
    header('Location: inscriptionAuthentification.php');
}

include_once(__DIR__."/../controlleurs/CommandeControlleur.php");
$commandeControlleur = new \controlleurs\CommandeControlleur();

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
<?php include("header.php")?>
<body>
<div class='body'>
    <div class='titre'>
        <h2>Historique des commandes</h2>
    </div>
    <?php
    $commandeControlleur->afficherToutesLesCommandes();
    ?>

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