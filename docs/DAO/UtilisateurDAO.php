<?php

include_once(__DIR__.'/../models/Utilisateur.php');

class UtilisateurDAO
{

    public function creerUtilisateur($tmp) {

        $utilisateur = new \models\Utilisateur();
        $utilisateur->setIdUtilisateur($tmp['id_utilisateur']);
        $utilisateur->setNomUtilisateur($tmp['nom_utilisateur']);
        $utilisateur->setPrenomUtilisateur($tmp['prenom_utilisateur']);
        $utilisateur->setDateNaisUtilisateur($tmp['date_nais_utilisateur']);
        $utilisateur->setMailUtilisateur($tmp['mail_utilisateur']);
        $utilisateur->setMdpUtilisateur($tmp['mdp_utilisateur']);

        return $utilisateur;
    }

    public function lireRequete($sql, $arguments) {

        require 'DAO.php';

        $bdd = new PDO("mysql:host=localhost;dbname=$db_name",$user,$pass);
        $rs = $bdd->prepare($sql);
        $rs->execute($arguments);
        $listUtilisateur = array();
        while ($tmp = $rs->fetch()) {
            $utilisateur = $this->creerUtilisateur($tmp);
            array_push($listUtilisateur, $utilisateur);
        }

        return $listUtilisateur;
    }

    public function insertUtilisateur($idUtilisateur, $nomUtilisateur, $prenomUtilisateur, $dateNaissUtilisateur, $mailUtilisateur, $mdpUtilisateur){
        $sql = "INSERT into UTILISATEUR Values (?, ?,?,?, ?,?);";
        $arguments = array();
        array_push($arguments,$idUtilisateur, $nomUtilisateur, $prenomUtilisateur, $dateNaissUtilisateur, $mailUtilisateur, $mdpUtilisateur);
        return $this->lireRequete($sql, $arguments);
    }

    public function getUtilisateurParMail($mailUtilisateur){
        $sql = "SELECT * FROM UTILISATEUR WHERE mail_utilisateur = ?;";
        $arguments = array();
        array_push($arguments, $mailUtilisateur);
        return $this->lireRequete($sql, $arguments);
    }

}