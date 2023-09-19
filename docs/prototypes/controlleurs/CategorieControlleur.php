<?php

namespace controlleurs;

use DAO\CategorieDAO;

include(__DIR__ . "/../DAO/CategorieDAO.php");

class CategorieControlleur
{
    public $categorieDAO;
    public $listeCategories;

    function __construct(){
        $this->categorieDAO = new \CategorieDAO();
        $this->listeCategories = $this->categorieDAO->getToutesLesCategories();
    }

    public function afficherToutesLesCategories(){
        $html = "";
        $num_sous_categorie = 0;
        foreach ($this->listeCategories as $categorie){
            $num_sous_categorie += 1;
            $html .= "<input type='checkbox' id='sous-cat". $num_sous_categorie ."' name='". $categorie->getNomCategorie() ."'>
                <label for='sous-cat". $num_sous_categorie ."'>". $categorie->getNomCategorie() ."</label><br>";
        }
        echo $html;
    }

}