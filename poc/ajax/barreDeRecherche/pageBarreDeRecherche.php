<!DOCTYPE html>
<html lang='fr'>
<head>
    <link href="barreDeRecherche.css" rel="stylesheet">
    <script src="barreDeRecherche.js"></script>
    <title>POC de la barre de Recherche</title>
</head>

<body>
    <div class='rech'>
        <input onkeyup="recherche(this.value)" id="barreDeRecherche" type='text' name='search' placeholder='Recherche..'>
    </div>
    <div>
        <p>Suggestions : </p>
        <div id="suggestions"></div>
    </div>
</body>
</html>
