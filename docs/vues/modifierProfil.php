<?php
include_once(__DIR__."/../controlleurs/UtilisateurControlleur.php");
$utilisateurControlleur = new \controlleurs\UtilisateurControlleur();
session_start();
if(!isset ($_SESSION['mail_utilisateur'])){
    header('Location: authentification.php');
}

if(isset ($_POST['sub'])){
    $utilisateurControlleur->modifierUtilisateur($_POST['nomUtilisateur'],$_POST['prenomUtilisateur'],$_POST['dateUtilisateur'],$_POST['mailUtilisateur']);
    $_SESSION['mail_utilisateur'] = $_POST['mailUtilisateur'];
    //header('Location: accueil.php');
}
?>

<!DOCTYPE html>
<html lang='fr'>
<head>
    <link href="css/modifierProfil.css" rel="stylesheet">
    <link href="css/menu.css" rel="stylesheet">
    <script src="js/acceuil.js"></script>
</head>
<?php include("header.php")?>
<body>
<form method="post">
<div class='body'>
    <div class='profilTitre'>
        <h1>Profil</h1>
    </div>
    <?php
    $utilisateurControlleur->saisieDonneeModifierProfil();
    ?>
</div>
</form>
<footer>
    <h3>Condition d'utilisation</h3>
    <h3>Date mise à jour</h3>
    <h3>Réseaux sociaux</h3>
</footer>
</body>
</html>