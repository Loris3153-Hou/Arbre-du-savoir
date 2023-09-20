<?php

    $idFormation = $_GET['idFormation'];
?>
<!DOCTYPE html>
<html lang='fr'>
<head>
    <meta charset='UTF-8'>
    <title>Arbre du Savoir</title>
    <link href="css/modifier-produit.css" rel="stylesheet">
    <script src="js/modifier-produit.js"></script>
</head>
<body>
    <header>
            <img src='../images/hamb.png' alt='Programmer en C' width='90px' height='80px'>
            <h1>Arbre du Savoir</h1>
            <img src='../images/logo.png' alt='Programmer en C' width='90px' height='80px'>
    </header>
    <div class='body'>
        <div class='titre'>
            <h1>Modifier le produit</h1>
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

