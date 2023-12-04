<?php
$listeUtilisateurs = [
    [
        'email' => 'utilisateur1@example.com',
        'mot_de_passe' => 'mdp_utilisateur1'
    ],
    [
        'email' => 'utilisateur2@example.com',
        'mot_de_passe' => 'mdp_utilisateur2'
    ],
    [
        'email' => 'utilisateur3@example.com',
        'mot_de_passe' => 'mdp_utilisateur3'
    ],
    [
        'email' => 'utilisateur4@example.com',
        'mot_de_passe' => 'mdp_utilisateur4'
    ],
    [
        'email' => 'utilisateur5@example.com',
        'mot_de_passe' => 'mdp_utilisateur5'
    ]
];

if ($_GET["value"] == "auth") {
    $html = '';
    if (!empty($_POST["email"]) and !empty($_POST["password"])) {

        foreach ($listeUtilisateurs as $util) {
            $res = 0;
            if ($_POST["email"] == $util["email"]) {
                if ($_POST["password"] == $util["mot_de_passe"]) {
                    $html = '<br><br><h3 class="text" style="color:green;">Authentification reussi</h3>';
                } else {
                    $html = '<br><br><h3 class="text" style="color:red;">Mot de passe incorrect</h3>';
                }
                $res = 1;
                break;
            }
        }
        if ($res == 0) {
            $html = '<br><br><h3 class="text" style="color:red;">Aucun compte correspondant !</h3>';
        }

    } else {
        $html = '<br><br><h3 class="text" style="color:red;">Veuillez renseigner tout les champs</h3>';
    }
    echo $html;
}

if ($_GET["value"] == "insc") {
    $html = '';
    if (!empty($_POST["nom"]) and !empty($_POST["prenom"]) and !empty($_POST["date_naissance"]) and !empty($_POST["email_inscription"]) and !empty($_POST["password_inscription"])) {

        $html = '<h3 class="text" style="color:green;">Inscription reussi</h3>';
    }else {
        $html = '<h3 class="text" style="color:red;">Veuillez renseigner tout les champs</h3>';
    }
    echo $html;
}

if (isset($_GET["value"])){
    $html = '';
    if ($_GET["value"] == "inscription") {
        $html = '<h1>Inscription</h1>';

        echo $html;
    }elseif ($_GET["value"] == "authentification") {
        $html = '<h1>Connexion</h1>';

        echo $html;
    }
}

