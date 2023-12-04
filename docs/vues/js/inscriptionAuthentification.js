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
    xhttp.open("POST", "../ajax.php?value=auth", true);
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
    xhttp.open("POST", "../ajax.php?value=insc", true);
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
            document.getElementById("but-auth").style.backgroundColor ="#00008B";
            document.getElementById("but-insc").style.backgroundColor ="#3498db";
        }
    };
    xhttp.open("POST", "../ajax.php?value=authentification", true);
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
            document.getElementById("but-auth").style.backgroundColor ="#3498db";
            document.getElementById("but-insc").style.backgroundColor ="#00008B";

        }
    };
    xhttp.open("POST", "../ajax.php?value=inscription", true);
    xhttp.responseType = "text";
    xhttp.send(data);

    return false;
});
