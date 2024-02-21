<?php

session_start();
if(!isset ($_SESSION['mail_utilisateur'])){
    header('Location: inscriptionAuthentification.php');
}

?>

<!DOCTYPE html>
<html lang='fr'>
    <head>
        <meta charset='UTF-8'>
        <title>Arbre du Savoir</title>
        <script src="js/pay.js"></script>
        <script src="js/panier.js"></script>
        <link href="css/general.css" rel="stylesheet">
        <link href="css/panier.css" rel="stylesheet">
        <link href="css/menu.css" rel="stylesheet">
    </head>
    <body>
        <?php include("header.php") ?>

        <div class="parent">
            <div class="panier"> </div>
            <div class="recapitulatif"></div>
            <div class="texteRecapitulatif">
                <h2>Récapitulatif :</h2>
            </div>
            <?php

            include(__DIR__ . "/controlleurs/FormationControlleur.php");
            $formationControlleur = new \controlleurs\FormationControlleur();
            $formationControlleur->afficherRecapitulatifFormationsPanier();

            ?>
            <div class="button-paiement-recapitulatif">
                <button onclick="goPaymment()" id="bouton-paiement">Paiement</button>
            </div>

            <div class="textePanier">
                <h2 id="texte-panier">Panier :</h2>
            </div>
            <div class="description-article-panier">
                <?php

                $formationControlleur->afficherLesFormationsSelectionneesPagePanier();

                ?>
            </div>
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
