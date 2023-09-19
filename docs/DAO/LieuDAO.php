<?php

include_once(__DIR__.'/../models/Lieu.php');

class LieuDAO
{

    public function creerLieu($tmp) {

        $lieu = new \models\Lieu();

        $lieu->setIdLieu($tmp['id_lieu']);
        $lieu->setAdresseLieu($tmp['adresse_lieu']);
        $lieu->setVilleLieu($tmp['ville_lieu']);
        $lieu->setPaysLieu($tmp['pays_lieu']);

        return $lieu;
    }

    public function lireRequete($sql, $arguments) {

        require 'DAO.php';

        $bdd = new PDO("mysql:host=localhost;dbname=$db_name",$user,$pass);
        $rs = $bdd->prepare($sql);
        $rs->execute($arguments);

        $listLieu = array();
        while ($tmp = $rs->fetch()) {
            $lieu = $this->creerLieu($tmp);
            array_push($listLieu, $lieu);
        }
        return $listLieu;
    }

    public function getTousLesLieux(){
        $sql = "SELECT * FROM LIEU;";
        $argument = array();
        return $this->lireRequete($sql, $argument);
    }

    public function getLieuxParFormation($idFormation){
        $sql = "    SELECT LIEU.* FROM LIEU INNER JOIN FORMATION_LIEU ON LIEU.id_lieu = FORMATION_LIEU.id_lieu WHERE FORMATION_LIEU.id_formation = ?;";
        $argument = array();
        array_push($argument, $idFormation);
        return $this->lireRequete($sql, $argument);
    }

}