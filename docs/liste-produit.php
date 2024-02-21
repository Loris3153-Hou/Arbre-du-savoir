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
        <title>Liste des produits</title>
        <link href="css/general.css" rel="stylesheet">
        <link href="css/liste-produit.css" rel="stylesheet">
        <link href="css/menu.css" rel="stylesheet">
        <script src="js/description-produit.js"></script>
    </head>
    <body>
        <?php include("header.php") ?>
        <div class='body'>
            <div class='rech'>
                <input id="barreDeRecherche" type='text' name='search' placeholder='Recherche..' onkeyup="recherche(this.value)">
                <input type='submit' name='submit' 
                class='submit' value='Rechercher'>
            </div>
            <div class='tri'>
                <h2>Trier par :</h2>
                <select onchange="triParPrix(this)">
                    <option value='Alphabet'>---------</option>
                    <option value='prixC'>Prix croissant</option>
                    <option value='prixD'>Prix decroissant</option>
                </select>
            </div>
            <div class='filtre'>
                <h2>Filtres</h2>
                <h3>Catégorie d’activité :</h3>
                <form id="formulaireDesCatégories">
                    <?php

                    include_once(__DIR__ . "/controlleurs/CategorieControlleur.php");

                    $categorieControlleur = new \controlleurs\CategorieControlleur();

                    $categorieControlleur->afficherToutesLesCategories();

                    ?>
                </form>
                <h3>Lieux :</h3>
                <form id='formulaireDesLieux'>
                    <?php

                    include_once(__DIR__ . "/controlleurs/LieuControlleur.php");

                    $lieuControlleur = new \controlleurs\LieuControlleur();

                    $lieuControlleur->afficherTousLesLieux();

                    ?>
                </form>
            </div>
            
            <div class='produits' id="liste-des-produits">
                <!--<div class='produit'>
                    <img src='images/pdt1.jpg' alt='Marketing Digital Avancé' width='400' height='220'>
                    <h2>Marketing Digital Avancé</h2>
                    <p>Description du produit</p>
                </div>
                
                <div class='produit'>
                    <img src='images/pdt2.jpg' alt='Développement Web Full-Stack' width='400' height='220'>
                    <h2>Développement Web Full-Stack</h2>
                    <p>Description du produit</p>
                </div>
                
                <div class='produit'>
                    <img src='images/pdt3.jpg' alt='Leadership et Gestion d Équipe' width='400' height='220'>
                    <h2>Leadership et Gestion d'Équipe</h2>
                    <p>Description du produit</p>
                </div>
                
                <div class='produit'>
                    <img src='images/pdt4.jpg' alt='Développement d Applications Mobiles' width='400' height='220'>
                    <h2>Développement d'Applications Mobiles</h2>
                    <p>Description du produit</p>
                </div>
                
                <div class='produit'>
                    <img src='images/pdt5.jpg' alt='Marketing des Réseaux Sociaux' width='400' height='220'>
                    <h2>Marketing des Réseaux Sociaux</h2>
                    <p>Description du produit</p>
                </div>
                
                <div class='produit'>
                    <img src='images/pdt6.jpg' alt='Cybersécurité et Protection des Données' width='400' height='220'>
                    <h2>Cybersécurité et Protection des Données</h2>
                    <p>Description du produit</p>
                </div>

                <div class='produit'>
                    <img src='images/pdt7.jpg' alt='Gestion de Projet Agile' width='400' height='220'>
                    <h2>Gestion de Projet Agile</h2>
                    <p>Description du produit</p>
                </div>
                
                <div class='produit'>
                    <img src='images/pdt8.jpg' alt='Leadership Stratégique' width='400' height='220'>
                    <h2>Leadership Stratégique</h2>
                    <p>Description du produit</p>
                </div>
                
                <div class='produit'>
                    <img src='images/test.jpg' alt='Programmer en C' width='400' height='220'>
                    <h2>Programmer en C</h2>
                    <p>Description du produit</p>
                </div>-->

                <?php

                include_once(__DIR__ . "/controlleurs/FormationControlleur.php");

                $formationControlleur = new \controlleurs\FormationControlleur();

                $formationControlleur->afficherToutesLesFormationsPageListeProduits();

                ?>

            </div>
        </div>
        <footer>
            <h3>Condition d'utilisation</h3>
            <h3>Date mise à jour</h3>
            <h3>Réseaux sociaux</h3>
        </footer>  
    </body>
</html>
