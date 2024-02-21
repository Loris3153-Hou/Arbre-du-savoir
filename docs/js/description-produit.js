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
    xhttp.open("GET", "controlleurs/RechercheFormations.php?valeurRecherche=" + valeurEntree, true);
    xhttp.send();
}

function triParPrix(prix){
    var requete = new XMLHttpRequest();

    requete.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {
            console.log(this.response);
            var res = this.response;
            if (res.success) {
                document.getElementById("liste-des-produits").innerHTML = res.msg;
                console.log(res.success)
            } else {
                alert(res.msg);
            }
        } else if (this.readyState == 4) {
            alert("Une erreur est survenue...");
        }
    };

    requete.open("POST", "controlleurs/TriPrixControlleur.php", true);
    requete.responseType = "json";
    requete.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    requete.send("ChoixTri=" + prix.value);

    return false;
}



document.addEventListener("DOMContentLoaded", function() {
    const form = document.getElementById('formulaireDesLieux');
    let listeLieuSelectionne = [];

    form.addEventListener('change', function() {
        const lieuxSelectionne = document.getElementsByClassName("choixDuLieu");
        let nouveauxLieuxSelectionnes = [];

        for (let lieu of lieuxSelectionne) {
            if (lieu.checked) {
                nouveauxLieuxSelectionnes.push(lieu.name);
            }
        }

        // Supprimer les lieux qui ne sont plus cochés de listeLieuSelectionne
        listeLieuSelectionne = listeLieuSelectionne.filter(function(lieu) {
            return nouveauxLieuxSelectionnes.includes(lieu);
        });

        // Mettre à jour listeLieuSelectionne avec les nouveaux lieux sélectionnés
        nouveauxLieuxSelectionnes.forEach(function(nouveauLieu) {
            if (!listeLieuSelectionne.includes(nouveauLieu)) {
                listeLieuSelectionne.push(nouveauLieu);
            }
        });
        filtrerParLieu(listeLieuSelectionne);
        console.log(listeLieuSelectionne);
    });
});


function filtrerParLieu(lieux){
    var requete = new XMLHttpRequest();

    requete.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {
            console.log(this.response);
            var res = this.response;
            if (res.success) {
                document.getElementById("liste-des-produits").innerHTML = res.msg;
                console.log(res.success)
            } else {
                alert(res.msg);
            }
        } else if (this.readyState == 4) {
            alert("Une erreur est survenue...");
        }
    };

    requete.open("POST", "controlleurs/FiltresControlleur.php", true);
    requete.responseType = "json";
    requete.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    requete.send("tableauLieux=" + lieux);

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