<?php

include_once(__DIR__.'/../DAO/CategorieDAO.php');
include_once(__DIR__.'/../DAO/LieuDAO.php');
include_once(__DIR__.'/../models/Formation.php');

class formationDAO
{

    public function creerFormation($tmp) {

        $formation = new \models\Formation();
        $categorieDAO = new CategorieDAO();
        $lieuDAO = new LieuDAO();

        $formation->setIdFormation($tmp['id_formation']);
        $formation->setTitreFormation($tmp['titre_formation']);
        $formation->setDescFormation($tmp['desc_formation']);
        $formation->setPhotoFormation($tmp['photo_formation']);
        $formation->setPrixFormation($tmp['prix_formation']);
        $formation->setNiveauFormation($tmp['niveau_formation']);
        $formation->setCertificationFormation($tmp['certification_formation']);
        $formation->setDateDebutFormation(date($tmp['date_debut_formation']));
        $formation->setDateFinFormation(date($tmp['date_fin_formation']));
        $formation->setListeCategories($categorieDAO->getCategoriesParFormation($formation->getIdFormation()));
        $formation->setListeLieux($lieuDAO->getLieuxParFormation($formation->getIdFormation()));

        return $formation;
    }

    public function lireRequete($sql, $arguments) {

        require 'DAO.php';

        $bdd = new PDO("mysql:host=localhost;dbname=$db_name",$user,$pass);
        $rs = $bdd->prepare($sql);
        $rs->execute($arguments);

        $listFormation = array();
        while ($tmp = $rs->fetch()) {
            $formation = $this->creerFormation($tmp);
            array_push($listFormation, $formation);
        }
        return $listFormation;
    }

    public function executerRequete($sql, $arguments) {

        require 'DAO.php';

        $bdd = new PDO("mysql:host=localhost;dbname=$db_name",$user,$pass);
        $rs = $bdd->prepare($sql);
        $rs->execute($arguments);

    }

    public function getToutesLesFormations(){
        $sql = "SELECT * FROM FORMATION;";
        $argument = array();
        return $this->lireRequete($sql, $argument);
    }

    public function getFormationParId($id){
        $sql = "SELECT * FROM FORMATION WHERE id_formation = ?;";
        $arguments = array();
        array_push($arguments, $id);
        return $this->lireRequete($sql, $arguments);
    }

    public function supprimerUneFormation($idFormation){
        $sql = "DELETE FROM FORMATION_CATEGORIE WHERE FORMATION_CATEGORIE.id_formation = ?;
                DELETE FROM FORMATION_LIEU WHERE FORMATION_LIEU.id_formation = ?;
                DELETE FROM FORMATION WHERE FORMATION.id_formation = ?;";
        $argument = array();
        array_push($argument, $idFormation, $idFormation, $idFormation);
        return $this->executerRequete($sql, $argument);
    }

    public function supprimerUneAssociationFormationLieu($idFormation, $idLieu){
        $sql = "DELETE FROM FORMATION_LIEU WHERE FORMATION_LIEU.id_formation = ? AND FORMATION_LIEU.id_lieu = ?;";
        $argument = array();
        array_push($argument, $idFormation, $idLieu);
        return $this->executerRequete($sql, $argument);
    }

    public function ajouterUneAssociationFormationLieu($idFormation, $idLieu){
        $sql = "INSERT INTO FORMATION_LIEU VALUES (?, ?);";
        $argument = array();
        array_push($argument, $idFormation, $idLieu);
        return $this->executerRequete($sql, $argument);
    }

    public function modifierUneFormation($titreFormation,$descFormation,$dateDebutFormation,$dateFinFormation,$prixFormation,$certificationFormation,$niveauFormation,$photoFormation,$idFormation){
        $sql = "UPDATE FORMATION SET FORMATION.titre_formation = ?, 
                FORMATION.desc_formation = ?, 
                FORMATION.date_debut_formation = ?, 
                FORMATION.date_fin_formation = ?, 
                FORMATION.prix_formation = ?, 
                FORMATION.certification_formation = ?, 
                FORMATION.niveau_formation = ?,
                FORMATION.photo_formation = ?
                WHERE FORMATION.id_formation = ?;";
        $argument = array();
        array_push($argument, $titreFormation,$descFormation,$dateDebutFormation,$dateFinFormation,$prixFormation,$certificationFormation,$niveauFormation,$photoFormation,$idFormation);
        return $this->executerRequete($sql, $argument);
    }

    public function ajouterUneFormation($titreFormation,$descFormation,$dateDebutFormation,$dateFinFormation,$prixFormation,$certificationFormation,$niveauFormation,$photoFormation){
        $sql = "INSERT INTO  FORMATION VALUES (0, ?, ?, ?, ?, ?, ?, ?, ?);";
        $argument = array();
        array_push($argument, $titreFormation,$descFormation,$photoFormation,$prixFormation,$niveauFormation,$certificationFormation,$dateDebutFormation,$dateFinFormation);
        return $this->executerRequete($sql, $argument);
    }

    public function getFormationParCommande($idCommande){
        $sql = "SELECT FORMATION.* FROM FORMATION INNER JOIN COMMANDE_FORMATION ON FORMATION.id_formation = COMMANDE_FORMATION.id_formation 
                    INNER JOIN COMMANDE ON COMMANDE_FORMATION.id_commande = COMMANDE.id_commande  WHERE COMMANDE_FORMATION.id_commande = ? ;";
        $argument = array();
        array_push($argument, $idCommande);
        return $this->lireRequete($sql, $argument);
    }

    public function getNombreFormationParCommande($idFormation, $idCommande){
        $sql = "SELECT nb_formation FROM COMMANDE_FORMATION WHERE id_formation = ? AND id_commande = ? ;";
        $argument = array();
        array_push($argument,$idFormation, $idCommande);
        return $this->lireRequete($sql, $argument);
    }

    public function getFormationParValeurDEntree($valeurEntree) {
        $sql = 'SELECT * FROM `FORMATION` WHERE titre_formation LIKE ?;';
        $argument = array();
        array_push($argument, '%' . $valeurEntree . '%');
        return $this->lireRequete($sql, $argument);
    }

    public function associerFormationALieu($idFormation, $idLieu){
        $sql = 'INSERT INTO FORMATION_LIEU VALUES (?, ?);';
        $argument = array();
        array_push($argument, $idFormation, $idLieu);
        return $this->executerRequete($sql, $argument);
    }
}