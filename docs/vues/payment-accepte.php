<?php
include_once "../controlleurs/CommandeControlleur.php";
include_once "../controlleurs/PaymentControlleur.php";
    session_start();
    if(!isset ($_SESSION['mail_utilisateur'])){
        header('Location: inscriptionAuthentification.php');
    }

    $commandeControlleur = new \controlleurs\CommandeControlleur();
    $commandeControlleur ->ajouterCommandeBDD();

    $paymentControlleur = new \controlleurs\PaymentControlleur();
    $paymentControlleur->confirmationPayement($_SESSION['mail_utilisateur']);

?>

<!DOCTYPE html>

    <head>
        <link href="css/payment-accepte.css" rel="stylesheet">
        <link href='https://fonts.googleapis.com/css?family=Montserrat' rel='stylesheet'>
        <script src="js/payment-accepte.js"></script>
    </head>

    <body>
        <div>
            <p class="texte-confirmation-suppression" id="corps-texte-confirmation-suppression">Le paiement est accepté</p>
            <button id="bouton-confirmer" onclick="redirectionhistorique()">retourner à l'historique des commandes</button>
        </div>
    </body>

</html>
