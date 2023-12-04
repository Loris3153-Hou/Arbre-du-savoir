function recherche(valeurEntree) {
    var xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {
            //console.log(this.responseText)
            document.getElementById("suggestions").innerHTML = this.responseText;
        }
    };
    xhttp.open("GET", "barreDeRechercheAction.php?value=" + valeurEntree, true);
    xhttp.send();
}