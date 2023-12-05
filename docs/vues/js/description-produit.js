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