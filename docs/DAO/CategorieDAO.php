<?php

include_once(__DIR__.'/../models/Categorie.php');

class CategorieDAO
{

    public function creerCategorie($tmp) {

        $categorie = new \models\Categorie();

        $categorie->setIdCategorie($tmp['id_categorie']);
        $categorie->setNomCategorie($tmp['nom_categorie']);

        return $categorie;
    }

    public function lireRequete($sql, $arguments) {

        require 'DAO.php';

        $bdd = new PDO("mysql:host=localhost;dbname=$db_name",$user,$pass);
        $rs = $bdd->prepare($sql);
        $rs->execute($arguments);

        $listCategorie = array();
        while ($tmp = $rs->fetch()) {
            $categorie = $this->creerCategorie($tmp);
            array_push($listCategorie, $categorie);
        }
        return $listCategorie;
    }

    public function getToutesLesCategories(){
        $sql = "SELECT * FROM CATEGORIE;";
        $argument = array();
        return $this->lireRequete($sql, $argument);
    }

}