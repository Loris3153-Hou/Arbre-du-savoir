<?php

include_once(__DIR__.'/../models/CommandeFormation.php');

class CommandeFormationDAO
{

    public function creerCommandeFormation($tmp) {

        $commandeFormation = new \models\CommandeFormation();

        $commandeFormation->setIdCommande($tmp['id_commande']);
        $commandeFormation->setIdFormation($tmp['id_formation']);
        $commandeFormation->setNbFormation($tmp['nb_formation']);

        return $commandeFormation;
    }

    public function lireRequete($sql, $arguments) {

        require 'DAO.php';

        $bdd = new PDO("mysql:host=localhost;dbname=$db_name",$user,$pass);
        $rs = $bdd->prepare($sql);
        $rs->execute($arguments);

        $listCommandeFormation = array();
        while ($tmp = $rs->fetch()) {
            $commandeFormation = $this->creerCommandeFormation($tmp);
            array_push($listCommandeFormation, $commandeFormation);
        }
        return $listCommandeFormation;
    }

    public function getParFormationEtCommande($idFormation, $idCommande){
        $sql = "SELECT * FROM COMMANDE_FORMATION WHERE id_formation = ? AND id_commande = ? ;";
        $argument = array();
        array_push($argument,$idFormation, $idCommande);
        return $this->lireRequete($sql, $argument);
    }


}