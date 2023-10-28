<?php
session_start();
if(!isset ($_SESSION['mail_utilisateur'])){
    header('Location: authentification.php');
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
<div class='body'>
    <div class='profilTitre'>
        <h1>Profil</h1>
    </div>
    <div class='profilNom'>
        <h3 class='text'>Nom :</h3>
        <input type='text' required>
    </div>

    <div class='profilPrenom'>
        <h3 class='text'>Prénom :</h3>
        <input type='text' required>
    </div>

    <div class='profilDate'>
        <h3 class='text'>Date de naissance :</h3>
        <input type='date' required>
    </div>

    <div class='profilMail'>
        <h3 class='text'>Adresse mail :</h3>
        <input type='text' required>
    </div>

    <div class='profilMdp'>
        <h3 class='text'>Mot de passe oublié ?</h3>
    </div>

    <div class='profilBouton'>
        <input class='boutton' type='submit'  value='Annuler'>
        <input class='boutton' type='submit'  value='Enregistrer'>
    </div>
</div>
<footer>
    <h3>Condition d'utilisation</h3>
    <h3>Date mise à jour</h3>
    <h3>Réseaux sociaux</h3>
</footer>
</body>
</html>