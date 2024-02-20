function goPageDescriptionProduit(id) {
    document.cookie = "id = " + id
    window.location.href = 'fiche-produit.php'
}

function recherche(valeurEntree) {
    var xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {
            //console.log(this.responseText)
            document.getElementById("liste-des-produits").innerHTML = this.responseText;
        }
    };
    xhttp.open("GET", "../controlleurs/RechercheFormations.php?valeurRecherche=" + valeurEntree, true);
    xhttp.send();
}

function triParPrix(prix){
    var requete = new XMLHttpRequest();

    requete.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {
            console.log(this.response);
            var res = this.response;
            if (res.success) {
                console.log(res.success)
            } else {
                alert(res.msg);
            }
        } else if (this.readyState == 4) {
            alert("Une erreur est survenue...");
        }
    };

    requete.open("POST", "../controlleurs/TriPrixControlleur.php", true);
    requete.responseType = "json";
    requete.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    requete.send("ChoixTri=" + prix.value);

    return false;
}

/*function triParPrix(valeurEntree) {
    var xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {
            //console.log(this.responseText)
            document.getElementById("liste-des-produits").innerHTML = this.responseText;
        }
    };
    xhttp.open("POST", "../controlleurs/RechercheFormations.php?value=" + valeurEntree, true);
    xhttp.send();
}*/