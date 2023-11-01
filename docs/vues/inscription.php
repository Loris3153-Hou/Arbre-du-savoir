<?php
    include_once(__DIR__."/../controlleurs/UtilisateurControlleur.php");
    $utilisateurControlleur = new \controlleurs\UtilisateurControlleur();

?>

<!DOCTYPE html>
<html lang='fr'>
<head>
    <link href="css/inscription.css" rel="stylesheet">
    <link href="css/menu.css" rel="stylesheet">
    <script src="js/acceuil.js"></script>
</head>
<header>
    <div class="hamburger-menu">
        <input id="menu__toggle" type="checkbox" />
        <label class="menu__btn" for="menu__toggle">
            <span></span>
        </label>

        <ul class="menu__box">
            <li><a class="menu__item" href="index.php">Acceuil</a></li>
        </ul>
    </div>
    <h1 onclick="goPageAccueil()">Arbre du Savoir</h1>
    <img onclick="goPageAccueil()" src='../images/logo.png' alt='Programmer en C' width='90px' height='80px'>
</header>
<body>
<form method="post">
    <div class='body'>
        <div class='inscriptionTitre'>
            <h1>S'inscrire</h1>
        </div>
        <div class='inscriptionNom'>
            <h3 class='text'>Nom :</h3>
            <input name='nom' type='text' required>
        </div>

        <div class='inscriptionPrenom'>
            <h3 class='text'>Prénom :</h3>
            <input name='prenom' type='text' required>
        </div>

        <div class='inscriptionDate'>
            <h3 class='text'>Date de naissance :</h3>
            <input name='date' type='date' required>
        </div>

        <div class='inscriptionMail'>
            <h3 class='text'>Adresse mail :</h3>
            <input name='mail' type='text' required>
        </div>

        <div class='inscriptionMdp'>
            <h3 class='text'>Mot de passe :</h3>
            <input name='mdp' type='password' required>
        </div>
<?php
    if (isset($_POST['sub'])) {
        $utilisateurControlleur->inscription(0, $_POST['nom'], $_POST['prenom'], $_POST['date'], $_POST['mail'], $_POST['mdp']);
    }
?>

        <div class='inscriptionBouton'>
            <input class='boutton' type='submit' name='sub' value='Sinscrire'>
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
