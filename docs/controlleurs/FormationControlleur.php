<?php

namespace controlleurs;

use models\Formation;

include(__DIR__ . "/../DAO/FormationDAO.php");

class FormationControlleur
{

    public $formationDAO;
    public $listeFormations;
   // public $laFormation;

    function __construct(){
        $this->formationDAO = new \formationDAO();
        $this->listeFormations = $this->formationDAO->getToutesLesFormations();
        //$this->laFormation = $this->formationDAO->getLaFormation();
    }

    public function afficherToutesLesFormationsPageListeProduits(){
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

    public function afficherToutesLesFormationsPageAdmin(){
        $html = "";
        foreach ($this->listeFormations as $formation){
            $html .= "<li class='produit-item'>
                            <h2 class='item'>". $formation->getTitreFormation() ."</h2>
                            <p class='produit-info item'>". $formation->getDescFormation() ."</p>
                            <p class='produit-info item'>". $formation->getPhotoFormation() ."</p>
                            <p class='produit-info item'>";

                foreach ($formation->getListeCategories() as $categorie){
                    $html .= $categorie->getNomCategorie() . "</br>";
                }

            $html .=                 "</p>
                            <p class='produit-info item'>". $formation->getPrixFormation() ." $ </p>
                            <p class='produit-info item'>";

            foreach ($formation->getListeLieux() as $lieu){
                $html .= $lieu->getVilleLieu() . "</br>";
            }

            $html .=        "</p>
                            <p class='produit-info item'>". $formation->getDateDebutFormation() ."</p>
                            <p class='produit-info item'>". $formation->getDateFinFormation() ."</p>
                            <p class='produit-info item'>". $formation->getCertificationFormation() ."</p>
                            <p class='produit-info item'>". $formation->getNiveauFormation() ."</p>
                            <div class='line-buttons'>
                                <button class='line-button item' onclick='goPageModifierProduit(" .$formation->getIdFormation()." )'>Modifier</button>
                                <button class='line-button item' onclick='goPageSupprimerProduit()'>Supprimer</button>
                            </div>
                        </li>";
        }
        echo $html;
    }

}