<?php
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Formulaire de Connexion et d'Inscription</title>
</head>
<body>
<div>
    <form id="form-auth" method="post">
        <input type="submit" value="Afficher le formulaire de Connexion">
    </form>
    <form id="form-insc" method="post">
        <input type="submit" value="Afficher le formulaire d'Inscription">
    </form>
</div>
<div id="test">
    <div id="connexion-form" style="visibility: hidden;">
        <form id="auth" method="post">
            <div id="titre-auth"></div>
            <label for="email">Adresse e-mail</label>
            <input type="email" id="email" name="email"><br><br>

            <label for="password">Mot de passe</label>
            <input type="password" id="password" name="password"> <br><br>
            <input type="submit" value="Se connecter">
        </form>
    </div>
    <div id="inscription-form" style="visibility: hidden;">
        <form id="insc" method="post">
            <div id="titre-insc"></div>
            <div>
                <label for="nom">Nom</label>
                <input type="text" id="nom" name="nom" >
            </div>
            <div>
                <label for="prenom">Prénom</label>
                <input type="text" id="prenom" name="prenom" >
            </div>
            <div>
                <label for="date_naissance">Date de Naissance</label>
                <input type="date" id="date_naissance" name="date_naissance" >
            </div>
            <div>
                <label for="email_inscription">Adresse e-mail</label>
                <input type="email" id="email_inscription" name="email_inscription" >
            </div>
            <div>
                <label for="password_inscription">Mot de passe</label>
                <input type="password" id="password_inscription" name="password_inscription" >
            </div>
            <div>
            <input type="submit" value="Sinscrire">
        </div>
        </form>
    </div>
</div>

<div id="erreur"></div>
<style>
    #connexion-form{
        position: absolute;
        z-index: 1;
    }
    #connexion-form{
        position: absolute;
        z-index: 0;
    }
</style>
<script>
    document.getElementById("auth").addEventListener("submit", function(e) {
        e.preventDefault();

        var data = new FormData(this);
        var xhttp = new XMLHttpRequest();
        document.getElementById("erreur").innerHTML ="";
        xhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
                console.log(this.responseText)
                document.getElementById("erreur").innerHTML =  this.responseText;
            }
        };
        xhttp.open("POST", "ajax.php?value=auth", true);
        xhttp.send(data);

        return false;
    });


    document.getElementById("insc").addEventListener("submit", function (e) {
        e.preventDefault();

        var data = new FormData(this);

        var xhttp = new XMLHttpRequest();
        document.getElementById("erreur").innerHTML = "";
        xhttp.onreadystatechange = function () {
            if (this.readyState == 4 && this.status == 200) {
                console.log(this.responseText)
                document.getElementById("erreur").innerHTML = this.responseText;
            }
        };
        xhttp.open("POST", "ajax.php?value=insc", true);
        xhttp.send(data);

        return false;
    });

   document.getElementById("form-auth").addEventListener("submit", function(e) {
       e.preventDefault();

       var data = new FormData(this);

       var xhttp = new XMLHttpRequest();
       document.getElementById("erreur").innerHTML ="";
       xhttp.onreadystatechange = function() {
           if (this.readyState == 4 && this.status == 200) {
               console.log(this.response)
               document.getElementById("titre-auth").innerHTML =  this.response;
               document.getElementById('inscription-form').style.visibility = "hidden";
               document.getElementById("titre-insc").innerHTML =  "";
               document.getElementById('connexion-form').style.visibility = "visible";
           }
       };
       xhttp.open("POST", "ajax.php?value=authentification", true);
       xhttp.responseType = "text";
       xhttp.send(data);

       return false;
   });

   document.getElementById("form-insc").addEventListener("submit", function(e) {
       e.preventDefault();

       var data = new FormData(this);

       var xhttp = new XMLHttpRequest();
       document.getElementById("erreur").innerHTML ="";
       xhttp.onreadystatechange = function() {
           if (this.readyState == 4 && this.status == 200) {
               console.log(this.response)
               document.getElementById("titre-insc").innerHTML =  this.response;
               document.getElementById('connexion-form').style.visibility = "hidden";
               document.getElementById("titre-auth").innerHTML =  "";
               document.getElementById('inscription-form').style.visibility = "visible";

           }
       };
       xhttp.open("POST", "ajax.php?value=inscription", true);
       xhttp.responseType = "text";
       xhttp.send(data);

       return false;
   });

</script>

</body>
</html>