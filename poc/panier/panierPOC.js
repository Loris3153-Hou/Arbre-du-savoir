function modifierNombreFormation(inputSelectQuantite){

    var requete = new XMLHttpRequest();

    requete.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {
            console.log(this.response);
            var res = this.response;
            if (res.success) {
                $sousTotal = document.getElementById("" + inputSelectQuantite.id + inputSelectQuantite.id);
                $ancienSousTotal = parseFloat($sousTotal.innerText.substr(0, $sousTotal.innerText.length - 2));
                $sousTotal.innerText = res.nouveauSousTotal + " €";

                $totalHTML = document.getElementById("totalCommande");
                $sousTotaux = document.getElementsByClassName("sous-total-commande");

                $nbFormationHTML = document.getElementById("" + inputSelectQuantite.id + inputSelectQuantite.id + inputSelectQuantite.id);
                $nbFormationHTML.innerText = res.nomFormation + " x " + inputSelectQuantite.value;

                $total = document.getElementById("totalCommande");
                $totalInital = parseFloat($total.innerText.substr(0, $total.innerText.length - 2)) - $ancienSousTotal;
                $nouveauTotal = $totalInital + res.nouveauSousTotal;
                $total.innerText = $nouveauTotal + " €";
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