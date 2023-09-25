<?php

    $idFormation = $_GET['idFormation'];
?>
<!DOCTYPE html>
<html lang='fr'>
<head>
    <meta charset='UTF-8'>
    <title>Arbre du Savoir</title>
    <link href="css/modifier-produit.css" rel="stylesheet">
    <link href="css/menu.css" rel="stylesheet">
    <script src="js/modifier-produit.js"></script>
</head>
<body>
    <?php include("header.php")?>
    <div class='body'>
        <div class='titre'>
            <h2>Modifier le produit</h2>
        </div>

        <?php

        include(__DIR__."/../controlleurs/FormationControlleur.php");

        $FormationControlleur = new \controlleurs\FormationControlleur();

        $FormationControlleur->saisieInputPageModifier($idFormation);

        ?>
    </div>
    <footer>
        <h3>Condition d'utilisation</h3>
        <h3>Date mise à jour</h3>
        <h3>Réseaux sociaux</h3>
    </footer>
</body>
</html>

