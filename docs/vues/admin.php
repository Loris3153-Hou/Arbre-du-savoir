<?php


?>
<!DOCTYPE html>
<html lang='fr'>
<head>
    <meta charset='UTF-8'>
    <title>Administrateur</title>
    <link href="css/admin.css" rel="stylesheet">
</head>
<body>
    <header>
            <img src='../images/hamb.png' alt='Programmer en C' width='90px' height='80px'>
            <h1>Arbre du Savoir</h1>
            <img src='../images/logo.png' alt='Programmer en C' width='90px' height='80px'>
    </header>
    <div class='body'>
    <div class='rech'>
        <input type='text' name='search' placeholder='Recherche..'>
        <input type='submit' name='submit' 
        class='submit' value='Rechercher'>
    </div>
    <button class='ajoutBoutton' type='button'>Ajouter</button> 
    <div class='produits'>   
        <ul class='produit-list'>
            <?php

            include(__DIR__."/../controlleurs/FormationControlleur.php");

            $formationControlleur = new \controlleurs\FormationControlleur();

            $formationControlleur->afficherToutesLesFormationsPageAdmin();

            ?>
        </ul>
    </div>
    </div>
    <footer>
        <h3>Condition d'utilisation</h3>
        <h3>Date mise à jour</h3>
        <h3>Réseaux sociaux</h3>
    </footer>  
</body>
</html>

