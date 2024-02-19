<?php
include_once(__DIR__ . "/controlleurs/UtilisateurControlleur.php");
$utilisateurControlleur = new \controlleurs\UtilisateurControlleur();

if (!isset($_SESSION['csrf_token'])) {
    $_SESSION['csrf_token'] = bin2hex(random_bytes(32));
}
$csrf_token = $_SESSION['csrf_token'];

unset($_SESSION['mail_utilisateur']);
unset($_SESSION['admin_utilisateur']);
unset($_SESSION['listeItemPanier']);

?>

<!DOCTYPE html>
<html lang='fr'>
<head>
    <link href="css/inscriptionAuthentification.css" rel="stylesheet">
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
    <img onclick="goPageAccueil()" src='images/logo.png' alt='Programmer en C' width='90px' height='80px'>
</header>
<body>
<div id="inputButton">
    <form id="form-auth" method="post">
        <input type="submit" class='boutton' id="but-auth" value="Authentification">
    </form>
    <form id="form-insc" method="post">
        <input type="submit" class='boutton' id="but-insc" value="Inscription">
    </form>
</div>
<div id="forms">
    <div id="inscription-form">
        <form id="insc" class='body-inscr' method="post">
            <div id="titre-insc" class="inscriptionTitre">

            </div>
            <input type="hidden" name="csrf_token" value="<?php echo $csrf_token; ?>">
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
                <input name='date' type ='date' required>
            </div>

            <div class='inscriptionMail'>
                <h3 class='text'>Adresse mail :</h3>
                <input name='mail' type='text' required>
            </div>

            <div class='inscriptionMdp'>
                <h3 class='text'>Mot de passe :</h3>
                <input name='mdp' type='password' required>
            </div>
            <div id='erreurInsc'>

            </div>
            <div class='inscriptionBouton'>
                <input class='boutton' type='submit' value='Sinscrire'>
            </div>
        </form>
    </div>


    <div  id="connexion-form">
        <form id="auth" class='body-auth' method="post">
            <div id="titre-auth" class="authTitre">
                <h1>Authentification</h1>
            </div>
            <input type="hidden" name="csrf_token" value="<?php echo $csrf_token; ?>">
            <div class='authMail'>
                <h3 class='text'>Adresse mail :</h3>
                <input name='mailUser' type='text' required>
            </div>

            <div class='authMdp'>
                <h3 class='text'>Mot de passe :</h3>
                <input name='passUser' type='password' required>
            </div>
            <div id='erreurAuth'>

            </div>
            <div class='authBouton'>
                <input name='sub' class='boutton' type='submit'  value='Sauthentifier'>
            </div>
        </form>
    </div>


<footer>
    <h3>Condition d'utilisation</h3>
    <h3>Date mise à jour</h3>
    <h3>Réseaux sociaux</h3>
</footer>
<script>

    document.getElementById("auth").addEventListener("submit", function(e) {
        e.preventDefault();

        var data = new FormData(this);
        var xhttp = new XMLHttpRequest();
        document.getElementById("erreurAuth").innerHTML ="";
        xhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
                console.log(this.responseText)
                document.getElementById("erreurAuth").innerHTML = this.responseText;
                if(this.responseText === "0" || this.responseText === "1"){
                    document.getElementById('connexion-form').style.borderColor = 'green';
                    setTimeout(() => {
                        window.location.replace("index.php");
                    }, 2000);
                }else{
                    setTimeout(() => {
                        document.getElementById('inscription-form').style.borderColor = 'red';
                    }, 2000);
                }
            }else{
                setTimeout(() => {
                    document.getElementById('inscription-form').style.borderColor = 'red';
                }, 2000);
            }
        };
        xhttp.open("POST", "controlleurs/inscriptionAuthentification-ajax.php?value=auth", true);
        xhttp.send(data);

        return false;
    });


    document.getElementById("insc").addEventListener("submit", function (e) {
        e.preventDefault();

        var data = new FormData(this);

        var xhttp = new XMLHttpRequest();
        document.getElementById("erreurInsc").innerHTML = "";
        xhttp.onreadystatechange = function () {
            if (this.readyState == 4 && this.status == 200) {
                console.log(this.responseText)
                document.getElementById("erreurInsc").innerHTML = this.responseText;
                if(this.responseText === "<h1>Authentification</h1>"){
                    document.getElementById("titre-auth").innerHTML =  this.response;
                    document.getElementById('inscription-form').style.borderColor = 'green';
                    setTimeout(() => {
                        document.getElementById('inscription-form').style.borderColor = '#3498db';
                    }, 2000);
                    document.getElementById('inscription-form').style.opacity = "0";
                    document.getElementById('inscription-form').style.visibility = "hidden";
                    document.getElementById("titre-insc").innerHTML =  "";
                    document.getElementById('inscription-form').style.transition = "transform 1s, visibility 0s, opacity 1s ease";
                    document.getElementById('connexion-form').style.transition = "transform 1s, visibility 0s, opacity 1s ease";
                    document.getElementById('inscription-form').style.transform = "rotateY(-180deg)";
                    document.getElementById('connexion-form').style.transform = "rotateY(0deg)";
                    document.getElementById('connexion-form').style.opacity = "1";
                    document.getElementById('connexion-form').style.visibility = "visible";
                    document.getElementById("but-auth").style.backgroundColor ="#00008B";
                    document.getElementById("but-insc").style.backgroundColor ="#3498db";
                    document.getElementById("but-auth").style.width = "135px";
                    document.getElementById("but-auth").style.height ="60px";
                    document.getElementById("but-insc").style.width = "120px";
                    document.getElementById("but-insc").style.height ="50px";
                }

            }
            else{
                document.getElementById('inscription-form').style.borderColor = 'red';
                setTimeout(() => {
                    document.getElementById('inscription-form').style.borderColor = '#3498db';
                }, 2000);

            }
        };
        xhttp.open("POST", "controlleurs/inscriptionAuthentification-ajax.php?value=insc", true);
        xhttp.send(data);

        return false;
    });

    document.getElementById("form-auth").addEventListener("submit", function(e) {
        e.preventDefault();

        var data = new FormData(this);

        var xhttp = new XMLHttpRequest();
        document.getElementById("erreurAuth").innerHTML ="";
        xhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
                console.log(this.response)
                document.getElementById("titre-auth").innerHTML =  this.response;
                document.getElementById('inscription-form').style.opacity = "0";
                document.getElementById('inscription-form').style.visibility = "hidden";
                document.getElementById("titre-insc").innerHTML =  "";
                document.getElementById('inscription-form').style.transition = "transform 1s, visibility 0s, opacity 1s ease";
                document.getElementById('connexion-form').style.transition = "transform 1s, visibility 0s, opacity 1s ease";
                document.getElementById('inscription-form').style.transform = "rotateY(-180deg)";
                document.getElementById('connexion-form').style.transform = "rotateY(0deg)";
                document.getElementById('connexion-form').style.opacity = "1";
                document.getElementById('connexion-form').style.visibility = "visible";
                document.getElementById("but-auth").style.backgroundColor ="#00008B";
                document.getElementById("but-insc").style.backgroundColor ="#3498db";
                document.getElementById("but-auth").style.width = "135px";
                document.getElementById("but-auth").style.height ="60px";
                document.getElementById("but-insc").style.width = "120px";
                document.getElementById("but-insc").style.height ="50px";
            }
        };
        xhttp.open("POST", "controlleurs/inscriptionAuthentification-ajax.php?value=authentification", true);
        xhttp.responseType = "text";
        xhttp.send(data);

        return false;
    });


    document.getElementById("form-insc").addEventListener("submit", function(e) {
        e.preventDefault();

        var data = new FormData(this);

        var xhttp = new XMLHttpRequest();
        document.getElementById("erreurInsc").innerHTML ="";
        xhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
                console.log(this.response)
                document.getElementById("titre-insc").innerHTML =  this.response;
                document.getElementById('connexion-form').style.opacity = "0";
                document.getElementById('connexion-form').style.visibility = "hidden";
                document.getElementById("titre-auth").innerHTML =  "";
                document.getElementById('inscription-form').style.transition = "transform 1s, visibility 0s, opacity 1s ease";
                document.getElementById('connexion-form').style.transition = "transform 1s, visibility 0s, opacity 1s ease";
                document.getElementById('connexion-form').style.transform = "rotateY(-180deg)";
                document.getElementById('inscription-form').style.transform = "rotateY(0deg)";
                document.getElementById('inscription-form').style.opacity = "1";
                document.getElementById('inscription-form').style.visibility = "visible";
                document.getElementById("but-auth").style.backgroundColor ="#3498db";
                document.getElementById("but-insc").style.backgroundColor ="#00008B";
                document.getElementById("but-insc").style.width = "135px";
                document.getElementById("but-insc").style.height ="60px";
                document.getElementById("but-auth").style.width = "120px";
                document.getElementById("but-auth").style.height ="50px";
            }
        };
        xhttp.open("POST", "controlleurs/inscriptionAuthentification-ajax.php?value=inscription", true);
        xhttp.responseType = "text";
        xhttp.send(data);

        return false;
    });

</script>
</body>
</html>
