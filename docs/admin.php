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
    <title>Administrateur</title>
    <link href="css/menu.css" rel="stylesheet">
    <link href="css/admin.css" rel="stylesheet">
    <script src="js/admin.js"></script>
</head>
<body>
    <?php include("header.php") ?>
    <div class='body'>
    <div class='recherche'>
        <input type='text' name='search' placeholder='Recherche..'>
        <input type='submit' name='submit' 
        class='submit' value='Rechercher'>
    </div>
    <button class='ajoutBoutton' type='button' onclick='goPageAjouterProduit()'>Ajouter</button>
    <div class='produits'>   
        <ul class='produits_list'>
            <?php

            include(__DIR__ . "s/controlleurs/FormationControlleur.php");

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
<style>
    header {
        position: static;
    }
</style>
</html>

