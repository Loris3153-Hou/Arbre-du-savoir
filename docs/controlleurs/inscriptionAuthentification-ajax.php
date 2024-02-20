<?php

include_once(__DIR__ . "/UtilisateurControlleur.php");
$utilisateurControlleur = new \controlleurs\UtilisateurControlleur();

if ($_GET["value"] == "insc") {
    $html = '';

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        if (!isset($_POST['csrf_token']) || $_POST['csrf_token'] !== $_SESSION['csrf_token']) {
            die("Erreur CSRF détectée!");
        }
    }

    $html = $utilisateurControlleur->inscription(0, $_POST['nom'], $_POST['prenom'], $_POST['date'], $_POST['mail'], $_POST['mdp']);

    /*if (!empty($_POST["nom"]) and !empty($_POST["prenom"]) and !empty($_POST["date_naissance"]) and !empty($_POST["email_inscription"]) and !empty($_POST["password_inscription"])) {

        $html = '<h3 class="text" style="color:green;">Inscription reussi</h3>';
    }else {
        $html = '<h3 class="text" style="color:red;">Veuillez renseigner tout les champs</h3>';
    }*/
    echo $html;
}

if ($_GET["value"] == "auth") {
    $html = '';

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        if (!isset($_POST['csrf_token']) || $_POST['csrf_token'] !== $_SESSION['csrf_token']) {
            die("Erreur CSRF détectée!");
        }
    }
    
    $html = $utilisateurControlleur->authentification($_POST['mailUser']);

    echo $html;
}

if (isset($_GET["value"])){
    $html = '';
    if ($_GET["value"] == "inscription") {
        $html = '<h1>Inscription</h1>';

        echo $html;
    }elseif ($_GET["value"] == "authentification") {
        $html = '<h1>Authentification</h1>';

        echo $html;
    }
}