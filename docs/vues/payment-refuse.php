<?php
    session_start();
    if(!isset ($_SESSION['mail_utilisateur'])){
        header('Location: authentification.php');
    }
?>

<!DOCTYPE html>

    <head>
        <link href="css/payment-refuse.css" rel="stylesheet">
        <link href='https://fonts.googleapis.com/css?family=Montserrat' rel='stylesheet'>
        <script src="js/payment-refuse.js"></script>
    </head>

    <body>
        <div>
            <p class="texte-confirmation-suppression" id="corps-texte-confirmation-suppression">Le paiement est refusé</p>
            <button id="bouton-confirmer" onclick="redirectionPanier()">retourner à la page panier</button>
        </div>
    </body>

</html>
