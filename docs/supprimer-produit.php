<?php

session_start();
if (!isset ($_SESSION['mail_utilisateur'])) {
    header('Location: inscriptionAuthentification.php');
}

include(__DIR__ . "/controlleurs/FormationControlleur.php");
$formationControlleur = new \controlleurs\FormationControlleur();

if (isset($_GET['idFormationASupprimer'])) {
    $idFormationASupprimer = $_GET['idFormationASupprimer'];
    $formationControlleur->supprimerLaFormation($idFormationASupprimer);
}

if (isset($_GET['idFormation'])) {
    $idFormation = $_GET['idFormation'];
} else {
    header('Location: admin.php');
    exit;
}

?>

<!DOCTYPE html>

    <head>
        <link href="css/general.css" rel="stylesheet">
        <link href="css/supprimer-produit.css" rel="stylesheet">
        <link href='https://fonts.googleapis.com/css?family=Montserrat' rel='stylesheet'>
        <script src="js/supprimer-produit.js"></script>
    </head>

    <body>
        <div>
            <p class="texte-confirmation-suppression" id="titre-texte-confirmation-suppression">Supprimer
                <?php $formationControlleur->ecrireNomFormation($idFormation); ?> ?</p>
            <p class="texte-confirmation-suppression" id="corps-texte-confirmation-suppression">Êtes-vous sûr de vouloir supprimer le produit :
                <?php  $formationControlleur->ecrireNomFormation($idFormation); ?> ? </p>
            <button id="bouton-confirmer" onclick="supprimerFormation(<?php echo $idFormation ?>)">Confirmer</button>
            <button id="bouton-annuler" onclick="annulerSuppression()">Annuler</button>
        </div>
    </body>

</html>
