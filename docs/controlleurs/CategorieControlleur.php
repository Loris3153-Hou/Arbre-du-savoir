<?php

namespace controlleurs;

include_once(__DIR__ . "/../DAO/CategorieDAO.php");

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

    public function afficherTousLesCategoriesVueModifierFormation($listeCategoriesFormation){
        $html = "";
        foreach ($this->listeCategories as $categorie){
            $html .= "<input type='checkbox' id='sous-catego' name='categorieFormation[]' value='". $categorie->getIdCategorie() ."'";
            foreach ($listeCategoriesFormation as $categorieFormation){
                if ($categorie->getIdCategorie() == $categorieFormation->getIdCategorie()){
                    $html .= " checked='true'";
                }
            }
            $html .= "><label for='sous-catego'>" . $categorie->getNomCategorie() ."</label><br><br>";
        }
        return $html;
    }
    public function afficherTousLesCategoriesVueAjouterFormation(){
        $html = "";
        foreach ($this->listeCategories as $categorie){
            $html .= "<input type='checkbox' id='sous-catego' name='categorieFormation[]' value='". $categorie->getIdCategorie() ."'>
                        <label for='sous-catego'>" . $categorie->getNomCategorie() ."</label><br><br>";
        }
        echo $html;
    }



}