<?php

namespace controlleurs;

include_once(__DIR__ . "/../DAO/UtilisateurDAO.php");

class UtilisateurControlleur
{
    public $utilisateurDAO;

    public function __construct()
    {
        $this->utilisateurDAO = new \UtilisateurDAO();
    }

    public function authentification($mailUtilisateur){

            $result =  $this->utilisateurDAO->getUtilisateurParMail($mailUtilisateur);
            if (count($result)==1) {
                $hashed = hash("md5", $_POST['passUser']);
                if ($hashed == $result[0]->mdpUtilisateur) {
                    echo "test";
                    session_start();
                    $_SESSION['mail_utilisateur'] = $result[0]->mailUtilisateur;
                    header('Location: accueil.php');
                }
            }
        }


    public function inscription($idUtilisateur, $nomUtilisateur, $prenomUtilisateur, $dateNaissUtilisateur, $mailUtilisateur, $mdpUtilisateur){

        $hashedMdpUtilisateur = hash("md5", $mdpUtilisateur);

        $result = $this->utilisateurDAO->insertUtilisateur($idUtilisateur, $nomUtilisateur, $prenomUtilisateur, $dateNaissUtilisateur, $mailUtilisateur, $hashedMdpUtilisateur);
        $mail = mail('tessier.nolan@yahoo.com', "Vérification mdp", "Bonjour, ceci est un test");

        if ($mail) echo "Un mail de réinitialisation du mot de passe vous a été envoyé."; else echo "Aucun compte ne correspond à cette adresse mail.";

        session_start();
        $_SESSION['mail_utilisateur'] = $_POST['mail'];
        //header('Location: authentification.php');

    }


}