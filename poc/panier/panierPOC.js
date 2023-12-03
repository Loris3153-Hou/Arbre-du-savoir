function modifierNombreFormation(inputSelectQuantite){

    var requete = new XMLHttpRequest();

    requete.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {
            console.log(this.response);
            var res = this.response;
            if (res.success) {
                $sousTotal = document.getElementById("" + inputSelectQuantite.id + inputSelectQuantite.id);
                $sousTotal.innerText = res.data + " €";

                $totalHTML = document.getElementById("totalCommande");
                $sousTotaux = document.getElementsByClassName("sous-total-commande");
                console.log($sousTotaux);
            } else {
                alert(res.msg);
            }
        } else if (this.readyState == 4) {
            alert("Une erreur est survenue...");
        }
    };

    requete.open("POST", "ajaxPOC.php", true);
    requete.responseType = "json";
    requete.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    requete.send("idFormation=" + inputSelectQuantite.id + "&nouveauNbFormation=" + inputSelectQuantite.value);

    return false;
}