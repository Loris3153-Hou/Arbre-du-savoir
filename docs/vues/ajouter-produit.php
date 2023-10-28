<?php
    include_once(__DIR__."/../controlleurs/FormationControlleur.php");
    $formationControlleur = new \controlleurs\FormationControlleur();
    include_once(__DIR__."/../controlleurs/LieuControlleur.php");
    $lieuControlleur = new \controlleurs\LieuControlleur();
    include_once(__DIR__."/../controlleurs/CategorieControlleur.php");
    $CategorieControlleur = new \controlleurs\CategorieControlleur();

    session_start();
    if(!isset ($_SESSION['mail_utilisateur'])){
        header('Location: authentification.php');
    }

    if (isset($_POST['boutonAjouterFormation'])) {
        $formationControlleur->ajouterLaFormation($_POST['ajouterFormationTitre'], $_POST['ajouterFormationDescription'],
            $_POST['ajouterFormationDateDebut'], $_POST['ajouterFormationDateFin'], $_POST['ajouterPrixCertification'],
            $_POST['ajouterFormationCertification'], $_POST['ajouterFormationNiveau'], $_POST['ajouterFormationPhoto']);
        header('Location: admin.php');
        exit;
    }

?>
<!DOCTYPE html>
<html lang='fr'>
<head>
    <meta charset='UTF-8'>
    <title>Ajouter produit</title>
    <link href="css/ajouter-produit.css" rel="stylesheet">
    <link href="css/menu.css" rel="stylesheet">
    <script src="js/ajouter-produit.js"></script>
</head>
<body>
    <?php include("header.php")?>
    <form method='post'>
    <div class='body'>
    <div class='titre'>
        <h1>Ajouter le produit</h1>
    </div>
    <div class="div3"> 
        <h3 class="text">Nom du produit</h3>
        <input name="ajouterFormationTitre" type='text'required>
    </div>
    <div class="div4"> 
        <h3 class="text">Catégorie</h3>
        <?php $CategorieControlleur->afficherTousLesCategoriesVueAjouterFormation() ?>
    </div>
    <div class="div6"> 
        <h3 class="text">Lieux</h3>
        <?php $lieuControlleur->afficherTousLesLieuxVueAjouterFormation() ?>
    </div>
    <div class="div7">
        <h3 class="text">Date début</h3>
        <input name="ajouterFormationDateDebut" type='date' required>
    </div>
    <div class="div8"> 
        <h3 class="text">Date fin</h3>
        <input name="ajouterFormationDateFin" type='date' required>
    </div>
    <div class="div9">
        <h3 class="text">Description</h3>
        <input name="ajouterFormationDescription" type='text' required>
    </div>
    <div class="div13">
        <h3 class="text">Niveau</h3>
        <input name="ajouterFormationNiveau" type='text' required>
    </div>
    <div class="div14">
        <h3 class="text">Photo</h3>
        <input name="ajouterFormationPhoto" type='file' required>
    </div>
    <div class='div12'>
        <h3 class='text'>Certification</h3>
        <input name='ajouterFormationCertification' type='text' required>
    </div>
    <div class='div5'>
        <h3 class='text'>Prix</h3>
        <input name='ajouterPrixCertification' type='text' required>
    </div>
    <div class="div10">
        <input class='boutton' type='submit' name='boutonAjouterFormation' value='Ajouter'>
    </div>
    <div class="div11"> 
        <button class='boutton' type='button' onclick='annulerAjout()'>Annuler</button>
    </div>
    </div>
    </form>
    <footer>
        <h3>Condition d'utilisation</h3>
        <h3>Date mise à jour</h3>
        <h3>Réseaux sociaux</h3>
    </footer>
</body>
</html>

