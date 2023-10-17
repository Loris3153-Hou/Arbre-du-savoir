<!DOCTYPE html>
<html lang='fr'>
<head>
    <meta charset='UTF-8'>
    <title>Paiement produit</title>
    <link href="css/paiement.css" rel="stylesheet">
    <link href="css/menu.css" rel="stylesheet">
</head>
<body>
<?php include("header.php")?>
    <div class='body'>
        <div class='titre'>
            <h1>Paiement produit</h1>
        </div>
        <div class="div3">
            <h3 class="text">Email</h3>
            <input name="ajouterFormationTitre" type='text'required>
        </div>
        <div class="div7">
            <h3 class="text">Numéro carte</h3>
            <input name="ajouterFormationDateDebut" type='text' required>
        </div>
        <div class="div8">
            <h3 class="text">Date d'expiration</h3>
            <input name="ajouterFormationDateFin" type='text' required>
            <h3 class="text">CVV</h3>
            <input name="ajouterFormationDateFin" type='text' required>
        </div>
        <div class="div13">
            <h3 class="text">Adresse</h3>
            <input name="ajouterFormationNiveau" type='text' required>
        </div>
        <div class='div12'>
            <h3 class='text'>Nom complet</h3>
            <input name='ajouterFormationCertification' type='text' required>
        </div>
        <div class='div5'>
            <h3 class='text'>Pays ou région</h3>
            <input name='ajouterPrixCertification' type='text' required>
        </div>
        <div class="div10">
            <div class="divSous">
                <h4 class='text'>Sous total (2 articles)</h4>
                <h4 class='text'>762 $</h4><br>
            </div>
            <div class="divTotal">
                <h3 class='text'>Total</h3>
                <h3 class='text'>762 $</h3>
            </div>
            <input class='boutton' type='submit' name='boutonAjouterFormation' value='Payer'>
        </div>
    </div>
<footer>
    <h3>Condition d'utilisation</h3>
    <h3>Date mise à jour</h3>
    <h3>Réseaux sociaux</h3>
</footer>
</body>
</html>