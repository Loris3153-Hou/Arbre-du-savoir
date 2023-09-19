<?php

namespace controlleurs;

use models\Formation;

include(__DIR__ . "/../DAO/FormationDAO.php");

class FormationControlleur
{

    public $formationDAO;
    public $listeFormations;

    function __construct(){
        $this->formationDAO = new \formationDAO();
        $this->listeFormations = $this->formationDAO->getToutesLesFormations();
    }

    public function afficherToutesLesFormations(){
        $html = "";
        foreach ($this->listeFormations as $formation){
            $html .= "<div class='produit'>
                        <img src='../images/". $formation->getPhotoFormation() . "' alt='". $formation->getPhotoFormation() . "' width='400' height='220'>
                        <h2>". $formation->getTitreFormation() ."</h2>
                        <p>Description du produit</p>
                      </div>";
        }
        echo $html;
    }

}