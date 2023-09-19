<?php

namespace controlleurs;

use DAO\LieuDAO;

include(__DIR__ . '/../DAO/LieuDAO.php');

class LieuControlleur
{

    public $lieuDAO;
    public $listeLieux;

    function __construct(){
        $this->lieuDAO = new \LieuDAO();
        $this->listeLieux = $this->lieuDAO->getTousLesLieux();
    }

    public function afficherTousLesLieux(){
        $html = "";
        $num_sous_categorie = 0;
        foreach ($this->listeLieux as $lieu){
            $num_sous_categorie += 1;
            $html .= "<input type='checkbox' id='sous-cat". $num_sous_categorie ."' name='". $lieu->getVilleLieu() ."'>
                <label for='sous-cat". $num_sous_categorie ."'>". $lieu->getVilleLieu() ."</label><br>";
        }
        echo $html;
    }

}