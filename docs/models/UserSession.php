<?php session_start();

/**
 * Retourne le chemin absolu vers le fichier qui contient les utilisateurs
 * @return string Chemin absolu du fichier
 */
function getUsersFilePath() {
  return __DIR__ . "/data/users.json";
}

/**
 * Récupère la liste complète de tous les utilisateurs
 * @return array Liste des utilisateurs
 */
function getUsers() {
  try {
    // Récupération du contenu du fichier
    $content = file_get_contents( getUsersFilePath() );
    // Convertion du JSON en Array
    return json_decode( $content, true );
  }
  catch( Exception $e ) {
    die( $e->getMessage() );
  }
}

/**
 * Recupère un seul utilisateur s'il existe
 * @param string $email Adresse email de l'utilisateur
 * @return array|bool l'utilisateur s'il existe, sinon false
 */
function getUser( $email ) {
    // Récupéartion de la liste de tous les utilisateurs
    $users = getUsers();

    // Si l'adresse e-mail est une clé de la liste des utilisateurs ...
    return array_key_exists($email, $users)
        ? $users[$email] // alors: retourne la valeur qui correspond
        : false;         // sinon: retourne faux
}

/**
 * Ajoute utilisateur dans le fichier
 * @param string $email Adresse email de l'utilisateur
 * @param string $password Mot de passe non hashé
 */
function addUser( $email, $password ) {
    // Récupération de la liste de tous les utilisateurs
    $users = getUsers();
    // Ajout du nouvel utilisateur
    $users[$email] = [
        'password' => hashPassword( $password ),
        'token'    => generateToken()
    ];
    // Sauvegarde de la liste des utilisateurs
    saveUsers( $users );
}

/**
 * Met à jour la liste des utilisateurs dans le fichier
 * @param array $users Liste des utilisateurs
 */
function saveUsers( $users ) {
    try {
        // Conversion de la liste des utilisateurs en JSON indenté
        $content = json_encode( $users, JSON_PRETTY_PRINT );
        // Remplacement du contenu du fichier.
        file_put_contents( getUsersFilePath(), $content );
    }
    catch( Exception $e ) {
        die( $e->getMessage() );
    }
}

/**
 * Hash un mot de passe
 * @param string $password Mot de passe non hashé
 * @return string Mot de passe hashé
 */
function hashPassword( $password ) {
    // Retour du mot de pass hashé
    return sha1( $password );
}

/**
 * Génère un nouveau token
 * @param string $length Taille du token souhaité. Par défaut : 40
 * @return string Token généré
 */
function generateToken( $length = 40 ) {
    $characters       = 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789-_!?./$';
    $charactersLength = strlen( $characters );
    $token            = '';
    for( $i = 0; $i < $length; $i++ ) {
        $token .= $characters[rand(0, $charactersLength - 1)];
    }
    return $token;
}

/**
 * Enregistre un nouvel utilisateur
 * @param string $email Adresse e-mail de l'utilisateur
 * @param string $password Mot de passe non hashé
 */
function register( $email, $password ) {
    // Récupération de l'utilisateur demandé
    $user = getUser( $email );
    // Si l'utilisateur existe déjà, on arrête tout.
    if( $user ) {
        die( "L'utilisateur {$email} est déjà enregistré." );
    }

    // Enregistrement du nouvel utilisateur
    addUser( $email, $password );
}

/**
 * Tente de connecter un utilisateur. Affecte les sessions.
 * @param string $email Adresse e-mail de l'utilisateur
 * @param string $password Mot de passe non hashé
 */
function login( $email, $password ) {
    // Récupération de l'utilisateur
    $user = getUser($email);

    // Si l'adresse e-mail n'a pas été trouvé.
    if( ! $user ) {
        die( "L'utilisateur1 {$email} n'est pas enregistré." );
    }

    // Si le de passe (hashé) ne correspond pas, on arrête tout.
    if( $user['password'] !== hashPassword($password) ) {
        die( "L'utilisateur2 {$email} n'est pas enregistré." );
    }

    // Génération d'un nouveau token de sécurité.
    $token = generateToken();

    // Enregistrement du nouveau token et sauvegarde des utilisateurs
    $users[$email]['token'] = $token;
    saveUsers( $users );

    // Enregistrement des données dans la session de l'utilisateur
    $_SESSION['user_email'] = $email;
    $_SESSION['user_token'] = $token;
}

/**
 * Vérifie que l'utilisateur soit connecté et que son token est valide
 * @return bool Indique si l'utilisateur et connecté et valide
 */
function isLogged() {
    // Si la session contient "user_email" et "user_token"
    if( isset($_SESSION['user_email']) && isset($_SESSION['user_token']) ) {
        // Récupération de l'utilisateur dans la liste
        $user = getUser( $_SESSION['user_email'] );
        
        // Si un utilisateur a bien été récupéré
        if( $user ) {
            // Si le token de la session correspond au token dans le fichier
            if( $_SESSION['user_token'] === $user['token'] ) {
                // Tout est bon
                return true;
            }
        }
    }

    // Une erreur a empêché d'arriver au "return true"
    return false;
}

/**
 * Déconnecte l'utilisateur (affecte la session)
 */
function logout() {
    session_destroy();
}
