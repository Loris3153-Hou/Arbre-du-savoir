<?php

$idFormation = $_GET['idFormation'];
?>

<!DOCTYPE html>

    <head>
        <link href="css/supprimer-produit.css" rel="stylesheet">
        <link href='https://fonts.googleapis.com/css?family=Montserrat' rel='stylesheet'>
        <script src="js/supprimer-produit.js"></script>
    </head>

    <body>
        <div>
            <p class="texte-confirmation-suppression" id="titre-texte-confirmation-suppression">Supprimer
                <?php include(__DIR__."/../controlleurs/FormationControlleur.php");
                $formationControlleur = new \controlleurs\FormationControlleur();
                $formationControlleur->ecrireNomFormation($idFormation); ?> ?</p>
            <p class="texte-confirmation-suppression" id="corps-texte-confirmation-suppression">Êtes-vous sûr de vouloir supprimer le produit :
                <?php  $formationControlleur->ecrireNomFormation($idFormation); ?> ? </p>
            <button id="bouton-confirmer">Confirmer</button>
            <button id="bouton-annuler" onclick="annulerSuppression()">Annuler</button>
        </div>
    </body>

</html>
